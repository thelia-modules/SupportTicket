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
use Thelia\Core\Hook\BaseHook;
use Thelia\Tools\URL;

/**
 * Class ManagerHook
 * @package SupportTicket\Hook
 * @author Julien Chanséaume <jchanseaume@openstudio.fr>
 */
class ManagerHook extends BaseHook
{

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

    /*
    public function onOrderTab(HookRenderBlockEvent $event)
    {
        $event->add(
            [
                'id' => 'support-ticket',
                'title' => 'Support Ticket',
                'href' => '#',
                'content' => 'Not yet implemented',
            ]
        );
    }
    */
}
