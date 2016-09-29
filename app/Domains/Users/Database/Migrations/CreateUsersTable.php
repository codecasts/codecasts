<?php

namespace Codecasts\Domains\Users\Database\Migrations;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique()->index();
            $table->string('name');
            $table->string('email');
            $table->string('avatar')->nullable();
            $table->string('url')->nullable();
            $table->string('location')->nullable();
            $table->date('expires_at')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('subscription_id')->nullable();
            $table->string('subscription_plan')->nullable();
            $table->boolean('subscription_active')->nullable();
            $table->boolean('subscription_suspended')->nullable();
            $table->boolean('admin')->default(false);
            $table->boolean('guest')->default(false);
            $table->text('link')->nullable();
            $table->date('guest_until')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('users');
    }
}
