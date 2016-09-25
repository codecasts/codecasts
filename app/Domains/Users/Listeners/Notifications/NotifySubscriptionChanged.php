<?php

namespace Codecasts\Domains\Users\Listeners\Notifications;

use Codecasts\Domains\Users\Events\Subscriptions\SubscriptionChanged;
use Codecasts\Support\Notifications\Slack;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySubscriptionChanged implements ShouldQueue
{
    public function handle(SubscriptionChanged $event)
    {
        $slack = new Slack();

        $slack->notify("*@{$event->user->username}*'s subscription changed! Plan: *{$event->planIdentifier}*, Expiration: *{$event->expiresAt}*");
    }
}
