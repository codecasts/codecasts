<?php

namespace Codecasts\Domains\Users\Events\Subscriptions;

class InvoicePaymentFailed extends InvoiceCreated
{
    public $reason;

    public function __construct(array $requestData)
    {
        parent::__construct($requestData);

        $this->reason = $requestData['lr'];
    }
}
