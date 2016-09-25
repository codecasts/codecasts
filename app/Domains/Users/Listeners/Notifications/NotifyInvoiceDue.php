<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\InvoiceDue;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyInvoiceDue implements ShouldQueue
{
    public function handle(InvoiceDue $event)
    {
        $slack = new Slack();

        $slack->notify("*@{$event->user->username}*'s invoice *{$event->id}* is due.");
    }
}
