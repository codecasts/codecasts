<?php

namespace Codecasts\Domains\Podcasts\Database\Factories;

use Codecasts\Domains\Podcasts\Podcast;
use Codecasts\Support\Domain\ModelFactory;

/**
 * Class PodcastFactory.
 */
class PodcastFactory extends ModelFactory
{
    protected $model = Podcast::class;

    public function fields()
    {
        $title = $this->faker->sentence(4);

        return [
            'slug'             => str_slug($title),
            'title'            => $title,
            'description'      => $this->faker->sentence(10),
            'audio'            => 'CODECASTS'.$this->faker->numberBetween(1, 100),
            'authors'          => [1, 2, 3, 4, 5],
            'length'           => $this->faker->numberBetween(100, 1300),
            'published'        => $this->faker->boolean(50),
            'visible'          => $this->faker->boolean(50),
            'published_at'     => $this->faker->date('Y-m-d H:i:s'),
            'times_downloaded' => $this->faker->numberBetween(0, 300),
            'times_played'     => $this->faker->numberBetween(0, 3000),
        ];
    }
}
