<?php

namespace Codecasts\Domains\Lessons\Database\Migrations;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 150)->unique()->index();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('video')->nullable();
            $table->integer('length', false, true)->default(60);
            $table->enum('level', ['b', 'i', 'a'])->default('b')->index();
            $table->boolean('published')->default(false);
            $table->boolean('visible')->default(false);
            $table->boolean('paid')->default(true);
            $table->integer('track_id', false, true)->nullable()->index();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('lessons');
    }
}
