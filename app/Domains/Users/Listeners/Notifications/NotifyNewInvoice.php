<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\InvoiceCreated;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyNewInvoice implements ShouldQueue
{
    public function handle(InvoiceCreated $event)
    {
        $slack = new Slack();

        $slack->notify("Invoice *{$event->id}* generated to *@{$event->user->username}*");
    }
}
