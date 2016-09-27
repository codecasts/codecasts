<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\SubscriptionSuspended;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySubscriptionSuspended implements ShouldQueue
{
    public function handle(SubscriptionSuspended $event)
    {
        $slack = new Slack();

        $slack->notify("*@{$event->user->username}*'s just suspended his subscription :(");
    }
}
