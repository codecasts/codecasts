<?php

namespace Codecasts\Domains\Users\Transformers;

use Codecasts\Domains\Users\User;
use League\Fractal\TransformerAbstract as Transformer;

/**
 * Class UserTransformer.
 */
class UserTransformer extends Transformer
{
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];
    }
}
