<?php

namespace Codecasts\Domains\Lessons\Database\Migrations;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLessonsTagsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('lessons_tags', function (Blueprint $table) {
            $table->integer('tag_id', false, true)->index();
            $table->integer('lesson_id', false, true)->index();
            $table->primary(['tag_id', 'lesson_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('lessons_tags');
    }
}
