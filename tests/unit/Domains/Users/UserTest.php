<?php

namespace Codecasts\Domains\Users;

use Codecasts\Domains\Users\User;

class UserTest extends \TestCase
{

    /** @test */
    public function it_returns_the_correct_avatar_if_the_user_has_an_avatar()
    {
        $user = factory(User::class)->make([
            'avatar' => 'foobar.jpg',
        ]);

        $this->assertEquals('foobar.jpg?s=30', $user->getAvatarUrl());

        $user->avatar = 'foobar.jpg?foo=bar';

        $this->assertEquals('foobar.jpg?foo=bar&s=30', $user->getAvatarUrl());
    }

    /** @test */
    public function it_returns_the_gravatar_url_when_the_user_has_no_avatar()
    {
        $user = factory(User::class)->make();

        $expected_url = '//www.gravatar.com/avatar/' . md5($user->email) . '?s=30&d=identicon';

        $this->assertEquals($expected_url, $user->getAvatarUrl());
    }
}
