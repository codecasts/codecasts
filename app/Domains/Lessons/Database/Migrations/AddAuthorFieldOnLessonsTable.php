<?php

namespace Codecasts\Domains\Lessons\Database\Migrations;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAuthorFieldOnLessonsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('lessons', function (Blueprint $table) {
            $table->integer('author_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('lessons', function (Blueprint $table) {
            $table->dropColumn('author_id');
        });
    }
}
