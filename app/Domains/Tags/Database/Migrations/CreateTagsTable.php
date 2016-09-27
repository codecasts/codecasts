<?php

namespace Codecasts\Domains\Tags\Database\Migrations;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 30)->unique()->index();
            $table->string('tag')->unique()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('tags');
    }
}
