<?php

namespace Codecasts\Domains\Users;

use Codecasts\Support\Testing\DatabaseMigrations;
use Codecasts\Domains\Users\Contracts\SocialParser;
use Codecasts\Domains\Suggestions\Suggestion;

class UserTest extends \TestCase
{
    use DatabaseMigrations;

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

        $expected_url = '//www.gravatar.com/avatar/'.md5($user->email).'?s=30&d=identicon';

        $this->assertEquals($expected_url, $user->getAvatarUrl());
    }
    
    /** @test */
    public function it_returns_the_correct_admin_status()
    {
        $user = factory(User::class)->make();

        $this->assertEquals(false, $user->isAdmin());

        $user->admin = true;

        $this->assertEquals(true, $user->isAdmin());
    }
    
    /** @test */
    public function it_returns_the_correct_username_available()
    {
        $this->runDatabaseMigrations();

        $this->assertEquals(true, (new User)->usernameAvailable('teste'));

        factory(User::class)->make(['username'=>'teste'])->save();

        $this->assertEquals(false, (new User)->usernameAvailable('teste'));
    }
    
    /** @test */
    public function it_returns_the_correct_guest_until_format()
    {
        $user = factory(User::class)->make(['guest_until' => date('Y-m-d')]);

        $this->assertEquals(true, preg_match('#\d{2}/\d{2}/\d{4}#', $user->presentGuestUntil()));
    }
}
