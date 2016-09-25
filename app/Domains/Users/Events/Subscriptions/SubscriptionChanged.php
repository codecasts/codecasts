<?php

namespace Codecasts\Domains\Users\Events\Subscriptions;

use Codecasts\Domains\Users\User;
use Illuminate\Queue\SerializesModels;

class SubscriptionChanged
{
    use SerializesModels;

    public $id;

    public $accountId;

    public $expiresAt;

    public $planIdentifier;

    public $user;

    public function __construct(array $requestData)
    {
        $this->id = $requestData['id'];
        $this->accountId = $requestData['account_id'];
        $this->expiresAt = $requestData['expires_at'];
        $this->planIdentifier = $requestData['plan_identifier'];
        $this->user = $this->locateUser();
    }

    protected function locateUser()
    {
        return User::where('subscription_id', $this->id)
            ->first();
    }
}
