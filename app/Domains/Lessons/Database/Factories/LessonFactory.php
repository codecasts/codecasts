<?php

namespace Codecasts\Domains\Lessons\Database\Factories;

use Codecasts\Domains\Lessons\Lesson;
use Codecasts\Support\Domain\ModelFactory;

/**
 * Class PodcastFactory.
 */
class LessonFactory extends ModelFactory
{
    protected $model = Lesson::class;

    public function fields()
    {
        $title = $this->faker->sentence(4);

        return [
            'slug'             => str_slug($title),
            'title'            => $title,
            'description'      => $this->faker->sentence(10),
            'video'            => 'CODECASTS'.$this->faker->numberBetween(1, 100),
            'author_id'        => 1,
            'length'           => $this->faker->numberBetween(100, 1300),
            'published'        => $this->faker->boolean(50),
            'visible'          => $this->faker->boolean(50),
            'published_at'     => $this->faker->date('Y-m-d H:i:s'),
            'times_downloaded' => $this->faker->numberBetween(0, 300),
            'times_played'     => $this->faker->numberBetween(0, 3000),
        ];
    }
}
