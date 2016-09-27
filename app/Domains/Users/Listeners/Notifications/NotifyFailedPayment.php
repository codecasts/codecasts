<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\InvoicePaymentFailed;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyFailedPayment implements ShouldQueue
{
    public function handle(InvoicePaymentFailed $event)
    {
        $slack = new Slack();

        $slack->notify("Sadly, *@{$event->user->username}*'s attempt of paying invoice *{$event->id}* failed with code {$event->reason}.");
    }
}
