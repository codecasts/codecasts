<?php

namespace Codecasts\Domains\Users\Providers;

use Codecasts\Domains\Users\Events\Subscriptions;
use Codecasts\Domains\Users\Listeners\Notifications;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $listen = [
        Subscriptions\InvoiceCreated::class => [
            Notifications\NotifyNewInvoice::class,
        ],
        Subscriptions\InvoiceStatusChanged::class => [
            Notifications\NotifyInvoiceStatusChanged::class,
        ],
        Subscriptions\InvoiceRefund::class => [
            Notifications\NotifyInvoiceRefund::class,
        ],
        Subscriptions\InvoicePaymentFailed::class => [
            Notifications\NotifyFailedPayment::class,
        ],
        Subscriptions\InvoiceDue::class => [
            Notifications\NotifyInvoiceDue::class,
        ],
        Subscriptions\InvoiceDunning::class => [
            Notifications\NotifyInvoiceDunning::class,
        ],
        Subscriptions\InvoiceInstallmentReleased::class => [
            Notifications\NotifyInstallmentReleased::class,
        ],
        Subscriptions\InvoiceReleased::class => [
            Notifications\NotifyInvoiceReleased::class,
        ],
        Subscriptions\SubscriptionSuspended::class => [
            Notifications\NotifySubscriptionSuspended::class,
        ],
        Subscriptions\SubscriptionExpired::class => [
            Notifications\NotifySubscriptionExpired::class,
        ],
        Subscriptions\SubscriptionActivated::class => [
            Notifications\NotifySubscriptionActivated::class,
        ],
        Subscriptions\SubscriptionCreated::class => [
            Notifications\NotifySubscriptionCreated::class,
        ],
        Subscriptions\SubscriptionRenewed::class => [
            Notifications\NotifySubscriptionRenewed::class,
        ],
        Subscriptions\SubscriptionChanged::class => [
            Notifications\NotifySubscriptionChanged::class,
        ],
    ];
}
