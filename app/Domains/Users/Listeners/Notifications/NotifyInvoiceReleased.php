<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\InvoiceReleased;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyInvoiceReleased implements ShouldQueue
{
    public function handle(InvoiceReleased $event)
    {
        $slack = new Slack();

        $slack->notify("R$ {$event->amount} from *@{$event->user->username}*'s invoice *{$event->id}* has just been released! Yahooo!.");
    }
}
