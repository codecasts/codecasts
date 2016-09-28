<?php

namespace Codecasts\Domains\Users\Transformers;

use Codecasts\Domains\Users\User;
use League\Fractal\TransformerAbstract as Transformer;

/**
 * Class UserTransformer.
 */
class UserTransformer extends Transformer
{
    /**
     * Transform (normalize) the User class for api resources.
     *
     * @param User $user The user instance
     *
     * @return array Normalized array with user's data
     */
    public function transform(User $user)
    {
        return [
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
        ];
    }
}
