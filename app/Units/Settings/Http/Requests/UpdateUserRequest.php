<?php

namespace Codecasts\Units\Settings\Http\Requests;

use Codecasts\Support\Http\Request;

class UpdateUserRequest extends Request
{
    public function rules()
    {
        $userId = \Auth::user()->id;

        return [
            'username' => "required|unique:users,username,{$userId}",
            'name' => 'required',
            'email' => 'required|email',
        ];
    }
}
