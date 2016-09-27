<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\SubscriptionExpired;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySubscriptionExpired implements ShouldQueue
{
    public function handle(SubscriptionExpired $event)
    {
        $slack = new Slack();

        $slack->notify("*@{$event->user->username}*'s subscription just expired :(");
    }
}
