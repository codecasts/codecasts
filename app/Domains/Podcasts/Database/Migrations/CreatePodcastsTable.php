<?php

namespace Codecasts\Domains\Podcasts\Database\Migrations;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('podcasts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 150)->unique()->index();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('audio')->nullable();
            $table->json('authors')->nullable();
            $table->integer('length', false, true)->default(60);
            $table->boolean('published')->default(false);
            $table->boolean('visible')->default(false);
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
        $this->schema->drop('podcasts');
    }
}
