<?php

namespace Codecasts\Domains\Users\Events\Subscriptions;

use Codecasts\Domains\Users\User;
use Illuminate\Queue\SerializesModels;

class InvoiceCreated
{
    use SerializesModels;

    public $id;

    public $accountId;

    public $status;

    public $subscription_id;

    public $user;

    public function __construct(array $requestData)
    {
        $this->id = $requestData['id'];
        $this->accountId = $requestData['account_id'];
        $this->status = $requestData['status'];
        $this->subscription_id = $requestData['subscription_id'];
        $this->user = $this->locateUser();
    }

    protected function locateUser()
    {
        return User::where('subscription_id', $this->subscription_id)
            ->first();
    }
}
