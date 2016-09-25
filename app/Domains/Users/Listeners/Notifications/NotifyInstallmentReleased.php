<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\InvoiceInstallmentReleased;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyInstallmentReleased implements ShouldQueue
{
    public function handle(InvoiceInstallmentReleased $event)
    {
        $slack = new Slack();

        $slack->notify("R$ {$event->amount} from *@{$event->user->username}*'s invoice *{$event->id}* has just been released! Yahooo!.");
    }
}
