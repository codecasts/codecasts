<?php

namespace Codecasts\Domains\Suggestions\Database\Migrations;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('suggestions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id', false, true)->index();
            $table->string('title');
            $table->text('description');
            $table->boolean('visible')->default(false);
            $table->boolean('accepted')->default(false);
            $table->boolean('released')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('suggestions');
    }
}
