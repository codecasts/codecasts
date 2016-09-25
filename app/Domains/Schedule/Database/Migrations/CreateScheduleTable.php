<?php

namespace Codecasts\Domains\Schedule\Database\Migrations;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->date('planed_date');
            $table->string('type')->default('lesson');
            $table->string('title');
            $table->string('parent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('schedule');
    }
}
