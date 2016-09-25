<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\SubscriptionCreated;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySubscriptionCreated implements ShouldQueue
{
    public function handle(SubscriptionCreated $event)
    {
        $slack = new Slack();

        $slack->notify("*@{$event->user->username}*'s just created a subscription.");
    }
}
