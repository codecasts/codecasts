<?php

use Codecasts\Support\Testing\DatabaseMigrations;

class ProfileTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_user_can_edit_his_profile()
    {
        $this->runDatabaseMigrations();

        $user = factory(\Codecasts\Domains\Users\User::class)->create([
            'name' => 'John Doe',
            'username' => 'john_doe',
            'email' => 'john@doe.com',
        ]);

        $this->be($user);

        $this->visit(route('profile.edit'))
             ->see('John Doe')
             ->type('Jhon Doe', 'name')
             ->submitForm('Atualizar')
             ->see('Perfil Atualizado');
    }
}
