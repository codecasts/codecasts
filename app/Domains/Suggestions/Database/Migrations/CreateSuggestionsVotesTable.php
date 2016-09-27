<?php

namespace Codecasts\Domains\Suggestions\Database\Migrations;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuggestionsVotesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('suggestions_votes', function (Blueprint $table) {
            $table->integer('suggestion_id', false, true)->index();
            $table->integer('user_id', false, true)->index();
            $table->primary(['suggestion_id', 'user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('suggestions_votes');
    }
}
