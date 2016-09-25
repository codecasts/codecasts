<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\InvoiceDunning;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyInvoiceDunning implements ShouldQueue
{
    public function handle(InvoiceDunning $event)
    {
        $slack = new Slack();

        $slack->notify("Trying to **{$event->action}** *@{$event->user->username}*'s invoice *{$event->id}*.");
    }
}
