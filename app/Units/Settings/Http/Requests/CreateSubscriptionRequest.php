<?php

namespace Codecasts\Units\Settings\Http\Requests;

use Codecasts\Support\Http\Request;

class CreateSubscriptionRequest extends Request
{
    public function rules()
    {
        return [
            'plan' => 'required|in:P1M,P6M,P1Y',
        ];
    }
}
