<?php

namespace Codecasts\Support\Http;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Request.
 */
class Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
}