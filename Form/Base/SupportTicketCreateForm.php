<?php
/**
* This class has been generated by TheliaStudio
* For more information, see https://github.com/thelia-modules/TheliaStudio
*/

namespace SupportTicket\Form\Base;

use SupportTicket\SupportTicket;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Thelia\Form\BaseForm;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class SupportTicketCreateForm
 * @package SupportTicket\Form\Base
 * @author TheliaStudio
 */
class SupportTicketCreateForm extends BaseForm
{
    public const FORM_NAME = "support_ticket_create";

    public function buildForm(): void
    {
        $translationKeys = $this->getTranslationKeys();
        $fieldsIdKeys = $this->getFieldsIdKeys();

        $this->addStatusField($translationKeys, $fieldsIdKeys);
        $this->addCustomerIdField($translationKeys, $fieldsIdKeys);
        $this->addAdminIdField($translationKeys, $fieldsIdKeys);
        $this->addOrderIdField($translationKeys, $fieldsIdKeys);
        $this->addOrderProductIdField($translationKeys, $fieldsIdKeys);
        $this->addSubjectField($translationKeys, $fieldsIdKeys);
        $this->addMessageField($translationKeys, $fieldsIdKeys);
        $this->addResponseField($translationKeys, $fieldsIdKeys);
        $this->addCommentField($translationKeys, $fieldsIdKeys);
    }

    protected function addStatusField(array $translationKeys, array $fieldsIdKeys): void
    {
        $this->formBuilder->add("status", CheckboxType::class, array(
            "label" => $this->translator->trans($this->readKey("status", $translationKeys), [], SupportTicket::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("status", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(
            ),
            "attr" => array(
            )
        ));
    }

    protected function addCustomerIdField(array $translationKeys, array $fieldsIdKeys): void
    {
        $this->formBuilder->add("customer_id", IntegerType::class, array(
            "label" => $this->translator->trans($this->readKey("customer_id", $translationKeys), [], SupportTicket::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("customer_id", $fieldsIdKeys)],
            "required" => true,
            "constraints" => array(
                new NotBlank(),
            ),
            "attr" => array(
            )
        ));
    }

    protected function addAdminIdField(array $translationKeys, array $fieldsIdKeys): void
    {
        $this->formBuilder->add("admin_id", IntegerType::class, array(
            "label" => $this->translator->trans($this->readKey("admin_id", $translationKeys), [], SupportTicket::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("admin_id", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(
            ),
            "attr" => array(
            )
        ));
    }

    protected function addOrderIdField(array $translationKeys, array $fieldsIdKeys): void
    {
        $this->formBuilder->add("order_id", IntegerType::class, array(
            "label" => $this->translator->trans($this->readKey("order_id", $translationKeys), [], SupportTicket::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("order_id", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(
            ),
            "attr" => array(
            )
        ));
    }

    protected function addOrderProductIdField(array $translationKeys, array $fieldsIdKeys): void
    {
        $this->formBuilder->add("order_product_id", IntegerType::class, array(
            "label" => $this->translator->trans($this->readKey("order_product_id", $translationKeys), [], SupportTicket::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("order_product_id", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(
            ),
            "attr" => array(
            )
        ));
    }

    protected function addSubjectField(array $translationKeys, array $fieldsIdKeys): void
    {
        $this->formBuilder->add("subject", TextType::class, array(
            "label" => $this->translator->trans($this->readKey("subject", $translationKeys), [], SupportTicket::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("subject", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(
            ),
            "attr" => array(
            )
        ));
    }

    protected function addMessageField(array $translationKeys, array $fieldsIdKeys): void
    {
        $this->formBuilder->add("message", TextareaType::class, array(
            "label" => $this->translator->trans($this->readKey("message", $translationKeys), [], SupportTicket::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("message", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(
            ),
            "attr" => array(
            )
        ));
    }

    protected function addResponseField(array $translationKeys, array $fieldsIdKeys): void
    {
        $this->formBuilder->add("response", TextareaType::class, array(
            "label" => $this->translator->trans($this->readKey("response", $translationKeys), [], SupportTicket::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("response", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(
            ),
            "attr" => array(
            )
        ));
    }

    protected function addCommentField(array $translationKeys, array $fieldsIdKeys): void
    {
        $this->formBuilder->add("comment", TextareaType::class, array(
            "label" => $this->translator->trans($this->readKey("comment", $translationKeys), [], SupportTicket::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("comment", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(
            ),
            "attr" => array(
            )
        ));
    }

    public static function getName(): string
    {
        return static::FORM_NAME;
    }

    public function readKey($key, array $keys, $default = '')
    {
        return $keys[$key] ?? $default;
    }

    public function getTranslationKeys(): array
    {
        return array();
    }

    public function getFieldsIdKeys(): array
    {
        return array(
            "status" => "support_ticket_status",
            "customer_id" => "support_ticket_customer_id",
            "admin_id" => "support_ticket_admin_id",
            "order_id" => "support_ticket_order_id",
            "order_product_id" => "support_ticket_order_product_id",
            "subject" => "support_ticket_subject",
            "message" => "support_ticket_message",
            "response" => "support_ticket_response",
            "comment" => "support_ticket_comment",
        );
    }
}
