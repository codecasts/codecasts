<?php

namespace Codecasts\Units\Settings\Http\Requests;

use Codecasts\Support\Http\Request;

class UpdateSubscriptionRequest extends Request
{
    public function rules()
    {
        return [
            'action' => 'required|in:plan,activate,suspend',
        ];
    }
}
