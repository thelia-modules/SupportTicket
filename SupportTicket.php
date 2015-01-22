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

namespace SupportTicket;

use Propel\Runtime\Connection\ConnectionInterface;
use SupportTicket\Model\SupportTicketQuery;
use SupportTicket\Model\SupportTicket as SupportTicketModel;
use Thelia\Core\Translation\Translator;
use Thelia\Install\Database;
use Thelia\Model\ConfigQuery;
use Thelia\Model\LangQuery;
use Thelia\Model\Message;
use Thelia\Model\MessageQuery;
use Thelia\Module\BaseModule;

class SupportTicket extends BaseModule
{
    const MESSAGE_DOMAIN = "supportticket";

    /*
    const CONFIG_ENABLED = "supportticket_enabled";
    const CONFIG_THRESHOLD = "supportticket_threshold";
    const CONFIG_EMAILS = "supportticket_emails";

    const DEFAULT_ENABLED = "0";
    const DEFAULT_THRESHOLD = "1";
    const DEFAULT_EMAILS = "";
    */

    /** @var Translator  */
    protected $translator = null;

    public function postActivation(ConnectionInterface $con = null)
    {

        $languages = LangQuery::create()->find();

        /*
        ConfigQuery::write(self::CONFIG_ENABLED, self::DEFAULT_ENABLED);
        ConfigQuery::write(self::CONFIG_THRESHOLD, self::DEFAULT_THRESHOLD);
        ConfigQuery::write(self::CONFIG_EMAILS, self::DEFAULT_EMAILS);
        */

        // create new message
        if (null === MessageQuery::create()->findOneByName('supportticket_customer')) {

            $message = new Message();
            $message
                ->setName('supportticket_customer')
                ->setHtmlTemplateFileName('support-ticket-customer.html')
                ->setHtmlLayoutFileName('')
                ->setTextTemplateFileName('support-ticket-customer.txt')
                ->setTextLayoutFileName('')
                ->setSecured(0);

            foreach ($languages as $language) {
                $locale = $language->getLocale();

                $message->setLocale($locale);

                $message->setTitle(
                    $this->trans('Support Ticket - Customer', [], $locale)
                );
                $message->setSubject(
                    $this->trans('You have an answer to your question', [], $locale)
                );
            }

            $message->save();

            $message = new Message();
            $message
                ->setName('supportticket_administrator')
                ->setHtmlTemplateFileName('support-ticket-administrator.html')
                ->setHtmlLayoutFileName('')
                ->setTextTemplateFileName('support-ticket-administrator.txt')
                ->setTextLayoutFileName('')
                ->setSecured(0);

            foreach ($languages as $language) {
                $locale = $language->getLocale();

                $message->setLocale($locale);

                $message->setTitle(
                    $this->trans('Support Ticket - Administrator', [], $locale)
                );
                $message->setSubject(
                    $this->trans('A new support ticket has been posted ', [], $locale)
                );
            }

            $message->save();
        }

        $database = new Database($con);
        $database->insertSql(
            null,
            [__DIR__ . '/Config/create.sql']
        );

    }

    /*
    public static function getConfig()
    {
        $config = [
            'enabled' => (
                "1" == ConfigQuery::read(self::CONFIG_ENABLED, self::DEFAULT_ENABLED)
            ),
            'threshold' => (
            intval(ConfigQuery::read(self::CONFIG_THRESHOLD, self::DEFAULT_THRESHOLD))
            ),
            'emails' => (
            explode(',', ConfigQuery::read(self::CONFIG_EMAILS, self::DEFAULT_EMAILS))
            )
        ];

        return $config;
    }
    */

    protected function trans($id, array $parameters = [], $locale = null)
    {
        if (null === $this->translator) {
            $this->translator = Translator::getInstance();
        }

        return $this->translator->trans($id, $parameters, StockAlert::MESSAGE_DOMAIN, $locale);
    }
}
