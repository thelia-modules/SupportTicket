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
use Thelia\Controller\Front\BaseFrontController;
use Thelia\Form\Exception\FormValidationException;

/**
 * Class FrontController
 * @package SupportTicket\Controller
 * @author Julien Chanséaume <jchanseaume@openstudio.fr>
 */
class FrontController extends BaseFrontController
{

    protected $useFallbackTemplate = true;

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

            // todo save or dispatch an event
            $responseData['success'] = true;
            $responseData['message'] = 'ok';
        } catch (FormValidationException $e) {
            $responseData['message'] = $e->getMessage();
        } catch (\Exception $e) {
            $responseData['message'] = $e->getMessage();
        }

        return $this->jsonResponse(json_encode($responseData));
    }

    public function deleteAction()
    {

    }
}
