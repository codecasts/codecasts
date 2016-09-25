<?php

namespace Codecasts\Domains\Lessons\Database\Migrations;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLessonLogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('lesson_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('lesson_id')->index();
            $table->enum('action', ['play', 'download'])->default('play')->index();
            $table->index(['user_id', 'lesson_id', 'action']);
            $table->index(['lesson_id', 'action']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('lesson_logs');
    }
}
