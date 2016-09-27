<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\InvoiceRefund;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyInvoiceRefund implements ShouldQueue
{
    public function handle(InvoiceRefund $event)
    {
        $slack = new Slack();

        $slack->notify("*@{$event->user->username}*'s refund of invoice *{$event->id}* is *{$event->status}*");
    }
}
