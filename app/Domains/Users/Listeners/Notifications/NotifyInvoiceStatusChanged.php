<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\InvoiceStatusChanged;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyInvoiceStatusChanged implements ShouldQueue
{
    public function handle(InvoiceStatusChanged $event)
    {
        $slack = new Slack();

        $slack->notify("Invoice *{$event->id}* of *@{$event->user->username}* changed to *{$event->status}*");
    }
}
