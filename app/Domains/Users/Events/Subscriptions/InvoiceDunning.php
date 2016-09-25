<?php

namespace Codecasts\Domains\Users\Events\Subscriptions;

class InvoiceDunning extends InvoiceCreated
{
    public $action;

    public function __construct(array $requestData)
    {
        parent::__construct($requestData);

        $this->action = $requestData['action'];
    }
}
