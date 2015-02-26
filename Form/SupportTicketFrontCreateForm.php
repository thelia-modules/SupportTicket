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


namespace SupportTicket\Form;

use SupportTicket\SupportTicket;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\ExecutionContextInterface;
use Thelia\Core\Translation\Translator;
use Thelia\Form\BaseForm;
use Thelia\Model\OrderProductQuery;
use Thelia\Model\OrderQuery;

/**
 * Class SupportTicketFrontCreateForm
 * @package SupportTicket\Form
 * @author Julien Chanséaume <julien@thelia.net>
 */
class SupportTicketFrontCreateForm extends BaseForm
{

    /** @var Translator $translator */
    protected $translator;

    public function verifyOrder($value, ExecutionContextInterface $context)
    {
        $data = $context->getRoot()->getData();

        if (!empty($data["order_id"])) {
            $order = OrderQuery::create()->findPk($data["order_id"]);
            if (null === $order || !$order->isPaid() || $order->getCustomerId() != $data["customer_id"]) {
                $context->addViolation(
                    $this->trans("The order is not a valid order")
                );
            } else {
                if (!empty($data["order_product_id"])) {
                    $orderProduct = OrderProductQuery::create()->findPk($data["order_product_id"]);
                    if (null === $order || $orderProduct->getOrderId() !== $order->getId()) {
                        $context->addViolation(
                            $this->trans("The product is not a valid product")
                        );
                    }
                }
            }
        }
    }

    /**
     * @return string the name of you form. This name must be unique
     */
    public function getName()
    {
        return "supportticket_new";
    }

    /**
     *
     * in this function you add all the fields you need for your Form.
     * Form this you have to call add method on $this->formBuilder attribute :
     *
     * $this->formBuilder->add("name", "text")
     *   ->add("email", "email", array(
     *           "attr" => array(
     *               "class" => "field"
     *           ),
     *           "label" => "email",
     *           "constraints" => array(
     *               new \Symfony\Component\Validator\Constraints\NotBlank()
     *           )
     *       )
     *   )
     *   ->add('age', 'integer');
     *
     * @return null
     */
    protected function buildForm()
    {
        $this->formBuilder
            ->add(
                "customer_id",
                'text',
                [
                    "constraints" => [
                        new NotBlank(),
                        new Callback(
                            [
                                "methods" => [
                                    [$this, "verifyOrder"],
                                ]
                            ]
                        )
                    ]
                ]
            )
            ->add(
                "order_id",
                'text',
                [
                    "label" => $this->trans("Order"),
                ]
            )
            ->add(
                "order_product_id",
                'text',
                [
                    "label" => $this->trans("Product"),
                ]
            )
            ->add(
                "subject",
                'text',
                [
                    "label" => $this->trans("Subject"),
                    "constraints" => [
                        new NotBlank()
                    ]
                ]
            )
            ->add(
                "message",
                'textarea',
                [
                    "label" => $this->trans("Message"),
                    "constraints" => [
                        new NotBlank()
                    ]
                ]
            );
    }

    protected function trans($id, $parameters = [])
    {
        if (null === $this->translator) {
            $this->translator = Translator::getInstance();
        }

        return $this->translator->trans($id, $parameters, SupportTicket::MESSAGE_DOMAIN);
    }
}
