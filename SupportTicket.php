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
use Propel\Runtime\Exception\PropelException;
use Symfony\Component\DependencyInjection\Loader\Configurator\ServicesConfigurator;
use Thelia\Core\Translation\Translator;
use Thelia\Install\Database;
use Thelia\Model\LangQuery;
use Thelia\Model\Message;
use Thelia\Model\MessageQuery;
use Thelia\Module\BaseModule;

class SupportTicket extends BaseModule
{
    public const MESSAGE_DOMAIN = "supportticket";

    /** @var Translator|null */
    protected ?Translator $translator = null;

    /**
     * @throws PropelException
     */
    public function postActivation(ConnectionInterface $con = null): void
    {
        $languages = LangQuery::create()->find();

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

    protected function trans($id, array $parameters = [], $locale = null): string
    {
        if (null === $this->translator) {
            $this->translator = Translator::getInstance();
        }

        return $this->translator->trans($id, $parameters, self::MESSAGE_DOMAIN, $locale);
    }

    public static function configureServices(ServicesConfigurator $servicesConfigurator): void
    {
        $servicesConfigurator->load(self::getModuleCode().'\\', __DIR__)
            ->exclude([
                THELIA_MODULE_DIR.ucfirst(self::getModuleCode()).'/I18n/*',
                THELIA_MODULE_DIR.ucfirst(self::getModuleCode()).'/*/Base/*'
            ])
            ->autowire(true)
            ->autoconfigure(true);
    }
}
