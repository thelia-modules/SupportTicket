<?php
/**
* This class has been generated by TheliaStudio
* For more information, see https://github.com/thelia-modules/TheliaStudio
*/

namespace SupportTicket\Event\Base;

use Thelia\Core\Event\ActionEvent;
use SupportTicket\Model\SupportTicket;

/**
* Class SupportTicketEvent
* @package SupportTicket\Event\Base
* @author TheliaStudio
*/
class SupportTicketEvent extends ActionEvent
{
    protected $id;
    protected $status;
    protected $customerId;
    protected $adminId;
    protected $orderId;
    protected $orderProductId;
    protected $subject;
    protected $message;
    protected $response;
    protected $repliedAt;
    protected $comment;
    protected $supportTicket;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): SupportTicketEvent
    {
        $this->id = $id;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): SupportTicketEvent
    {
        $this->status = $status;

        return $this;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId): SupportTicketEvent
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getAdminId()
    {
        return $this->adminId;
    }

    public function setAdminId($adminId): SupportTicketEvent
    {
        $this->adminId = $adminId;

        return $this;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId): SupportTicketEvent
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getOrderProductId()
    {
        return $this->orderProductId;
    }

    public function setOrderProductId($orderProductId): SupportTicketEvent
    {
        $this->orderProductId = $orderProductId;

        return $this;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject): SupportTicketEvent
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message): SupportTicketEvent
    {
        $this->message = $message;

        return $this;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setResponse($response): SupportTicketEvent
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRepliedAt()
    {
        return $this->repliedAt;
    }

    /**
     * @param mixed $repliedAt
     */
    public function setRepliedAt($repliedAt): SupportTicketEvent
    {
        $this->repliedAt = $repliedAt;

        return $this;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment): SupportTicketEvent
    {
        $this->comment = $comment;

        return $this;
    }

    public function getSupportTicket()
    {
        return $this->supportTicket;
    }

    public function setSupportTicket(SupportTicket $supportTicket): SupportTicketEvent
    {
        $this->supportTicket = $supportTicket;

        return $this;
    }
}
