<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\SubscriptionActivated;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySubscriptionActivated implements ShouldQueue
{
    public function handle(SubscriptionActivated $event)
    {
        $slack = new Slack();

        $slack->notify("wow! *@{$event->user->username}*'s just activated his subscription!");
    }
}
