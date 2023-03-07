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

use Exception;
use SupportTicket\Event\SupportTicketEvent;
use SupportTicket\Event\SupportTicketEvents;
use SupportTicket\Model\SupportTicket;
use SupportTicket\Model\SupportTicketQuery;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Thelia\Controller\Front\BaseFrontController;
use Thelia\Core\HttpFoundation\Request;
use Thelia\Core\HttpFoundation\Response;
use Thelia\Core\Security\SecurityContext;
use Thelia\Core\Translation\Translator;

/**
 * Class FrontController
 * @package SupportTicket\Controller
 * @author Julien Chanséaume <julien@thelia.net>
 */
class FrontController extends BaseFrontController
{
    /** @var Translator $translator */
    protected $translator;

    public function defaultAction(): Response
    {
        $this->checkAuth();

        return $this->render('support-ticket');
    }

    public function createAction(EventDispatcherInterface $eventDispatcher): Response
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

            $eventDispatcher->dispatch($event, SupportTicketEvents::CREATE);

            $responseData['success'] = true;
            $responseData['message'] = 'ok';
        } catch (Exception $e) {
            $responseData['message'] = $e->getMessage();
        }

        return $this->jsonResponse(json_encode($responseData));
    }

    public function deleteAction($supportTicketId, Request $request, SecurityContext $securityContext, EventDispatcherInterface $eventDispatcher)
    {
        $this->checkAuth();

        $supportTicket = SupportTicketQuery::create()->findPk($supportTicketId);
        $customerId = $securityContext->getCustomerUser()->getId();

        if (null !== $supportTicket && $supportTicket->getCustomerId() === $customerId) {

            $event = new SupportTicketEvent();
            $event
                ->setId($supportTicketId)
                ->setStatus(SupportTicket::STATUS_CLOSED);

            $eventDispatcher->dispatch($event, SupportTicketEvents::UPDATE);

            $request->getSession()->getFlashBag()
                ->add(
                    'supportticket-message',
                    $this->trans('Your question has been deleted')
                );
        } else {
            $request->getSession()->getFlashBag()
                ->add(
                    'supportticket-message',
                    $this->trans("Sorry, this question can't be deleted.")
                );
        }

        return $this->generateRedirect('/module/SupportTicket/support');
    }

    protected function trans($id, $parameters = []): string
    {
        if (null === $this->translator) {
            $this->translator = Translator::getInstance();
        }

        return $this->translator->trans($id, $parameters, \SupportTicket\SupportTicket::MESSAGE_DOMAIN);
    }
}
