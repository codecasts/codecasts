<?php

namespace Codecasts\Domains\Users\Database\Factories;

use Codecasts\Domains\Users\User;
use Codecasts\Support\Domain\ModelFactory;

/**
 * Class UserFactory.
 */
class UserFactory extends ModelFactory
{
    /**
     * @var User Factory for the User Model
     */
    protected $model = User::class;

    /**
     * Define the User's Model Factory.
     */
    public function fields()
    {
        static $password;

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => $password ?: $password = bcrypt('secret'),
            'remember_token' => str_random(10),
        ];
    }
}
