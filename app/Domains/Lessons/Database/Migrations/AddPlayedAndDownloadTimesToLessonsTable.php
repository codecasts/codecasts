<?php

namespace Codecasts\Domains\Lessons\Database\Migrations;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPlayedAndDownloadTimesToLessonsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('lessons', function (Blueprint $table) {
            $table->unsignedInteger('times_downloaded')->default(0)->after('published_at');
            $table->unsignedInteger('times_played')->default(0)->after('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('lessons', function (Blueprint $table) {
            $table->dropColumn('times_downloaded');
            $table->dropColumn('times_played');
        });
    }
}
