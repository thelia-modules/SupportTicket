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


namespace SupportTicket\Hook;

use SupportTicket\SupportTicket;
use Thelia\Core\Event\Hook\HookRenderBlockEvent;
use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;
use Thelia\Tools\URL;

/**
 * Class ManagerHook
 * @package SupportTicket\Hook
 * @author Julien Chanséaume <jchanseaume@openstudio.fr>
 */
class ManagerHook extends BaseHook
{
    /*
    <!-- front -->
    <!-- fields="id,title,content" -->
    <tag name="hook.event_listener" event="account.additional" />
    <tag name="hook.event_listener" event="account-order.bottom" />
    <tag name="hook.event_listener" event="main.javascript-initialization" />

    <!-- back -->
    <!-- <tag name="hook.event_listener" event="module.configuration" type="back" /> -->
    <tag name="hook.event_listener" event="main.top-menu-tools" type="back" />
    <tag name="hook.event_listener" event="order.tab" type="back" />
    <tag name="hook.event_listener" event="customer.edit" type="back" />
    */

    // id,title,content
    public function onAccountAdditional(HookRenderBlockEvent $event)
    {
        $event->add(
            [
                'id' => 'account-support',
                'title' => $this->trans('Support', [], SupportTicket::MESSAGE_DOMAIN),
                'content' => $this->render(
                    'account-additional.html'
                )
            ]
        );
    }

    public function onAccountOrderBottom(HookRenderEvent $event)
    {

    }

    public function onMainJavascriptInitialization(HookRenderEvent $event)
    {

    }


    public function onModuleConfiguration(HookRenderEvent $event)
    {

    }

    // id,class,url,title
    public function onMainTopMenuTools(HookRenderBlockEvent $event)
    {
        $event->add(
            [
                'id' => 'menu-tools-support-ticket',
                'class' => 'menu-tools-support-ticket',
                'url' => URL::getInstance()->absoluteUrl('/admin/module/SupportTicket/support_ticket'),
                'title' => $this->trans('Support Ticket', [], SupportTicket::MESSAGE_DOMAIN)
            ]
        );
    }

    // id,title,href,content
    public function onOrderTab(HookRenderBlockEvent $event)
    {
        $event->add([
            'id' => 'support-ticket',
            'title' => 'Support Ticket',
            'href' => '#',
            'content' => 'Tada',
        ]);
    }

    public function onCustomerEdit(HookRenderEvent $event)
    {

    }

}
