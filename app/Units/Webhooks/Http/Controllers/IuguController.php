<?php

namespace Codecasts\Units\Webhooks\Http\Controllers;

use Codecasts\Domains\Users\Events\Subscriptions;
use Codecasts\Support\Http\Controller;
use Illuminate\Http\Request;

/**
 * Class IuguController.
 */
class IuguController extends Controller
{
    protected $events = [
        'invoice.created'              => Subscriptions\InvoiceCreated::class,
        'invoice.status_changed'       => Subscriptions\InvoiceStatusChanged::class,
        'invoice.refund'               => Subscriptions\InvoiceRefund::class,
        'invoice.payment_failed'       => Subscriptions\InvoicePaymentFailed::class,
        'invoice.due'                  => Subscriptions\InvoiceDue::class,
        'invoice.dunning_action'       => Subscriptions\InvoiceDunning::class,
        'invoice.installment_released' => Subscriptions\InvoiceInstallmentReleased::class,
        'invoice.released'             => Subscriptions\InvoiceReleased::class,
        'subscription.suspended'       => Subscriptions\SubscriptionSuspended::class,
        'subscription.expired'         => Subscriptions\SubscriptionExpired::class,
        'subscription.activated'       => Subscriptions\SubscriptionActivated::class,
        'subscription.renewed'         => Subscriptions\SubscriptionRenewed::class,
        'subscription.changed'         => Subscriptions\SubscriptionChanged::class,
    ];

    public function receive(Request $request)
    {
        $eventKey = $request->get('event');

        if (array_key_exists($eventKey, $this->events)) {
            $eventClass = $this->events[$eventKey];

            event(new $eventClass($request->get('data')));

            return [
                'status' => 'queued',
            ];
        }

        return response('not processed', 204);
    }
}
