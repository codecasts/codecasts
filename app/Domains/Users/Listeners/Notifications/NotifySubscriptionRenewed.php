<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\SubscriptionRenewed;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySubscriptionRenewed implements ShouldQueue
{
    public function handle(SubscriptionRenewed $event)
    {
        $slack = new Slack();

        $slack->notify("*@{$event->user->username}*'s just renewed his subscription.");
    }
}
