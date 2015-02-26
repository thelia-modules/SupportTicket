<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/


namespace SupportTicket\Controller;

use SupportTicket\Event\SupportTicketEvent;
use SupportTicket\Event\SupportTicketEvents;
use SupportTicket\Model\SupportTicket;
use SupportTicket\Model\SupportTicketQuery;
use Thelia\Controller\Front\BaseFrontController;
use Thelia\Core\Translation\Translator;
use Thelia\Form\Exception\FormValidationException;

/**
 * Class FrontController
 * @package SupportTicket\Controller
 * @author Julien Chanséaume <julien@thelia.net>
 */
class FrontController extends BaseFrontController
{
    protected $useFallbackTemplate = true;

    /** @var Translator $translator */
    protected $translator;

    public function defaultAction()
    {
        $this->checkAuth();

        return $this->render('support-ticket');
    }

    public function createAction()
    {
        $this->checkAuth();

        $this->checkXmlHttpRequest();

        $responseData = [
            "success" => false,
            "message" => ''
        ];

        $form = $this->createForm('support_ticket.front.create');

        try {
            $formData = $this->validateForm($form);

            $event = new SupportTicketEvent();
            $event->bindForm($formData);
            $event->setStatus(SupportTicket::STATUS_NEW);

            $this->dispatch(SupportTicketEvents::CREATE, $event);

            $responseData['success'] = true;
            $responseData['message'] = 'ok';
        } catch (FormValidationException $e) {
            $responseData['message'] = $e->getMessage();
        } catch (\Exception $e) {
            $responseData['message'] = $e->getMessage();
        }

        return $this->jsonResponse(json_encode($responseData));
    }

    public function deleteAction($supportTicketId)
    {
        $this->checkAuth();

        $supportTicket = SupportTicketQuery::create()->findPk($supportTicketId);
        $customerId = $this->getSecurityContext()->getCustomerUser()->getId();

        if (null !== $supportTicket && $supportTicket->getCustomerId() == $customerId) {

            $event = new SupportTicketEvent();
            $event
                ->setId($supportTicketId)
                ->setStatus(SupportTicket::STATUS_CLOSED);

            $this->dispatch(SupportTicketEvents::UPDATE, $event);

            $this->getSession()->getFlashBag()
                ->add(
                    'supportticket-message',
                    $this->trans('Your question has been deleted')
                );
        } else {
            $this->getSession()->getFlashBag()
                ->add(
                    'supportticket-message',
                    $this->trans("Sorry, this question can't be deleted.")
                );
        }

        return $this->generateRedirect('/module/SupportTicket/support');
    }

    protected function trans($id, $parameters = [])
    {
        if (null === $this->translator) {
            $this->translator = Translator::getInstance();
        }

        return $this->translator->trans($id, $parameters, \SupportTicket\SupportTicket::MESSAGE_DOMAIN);
    }
}
