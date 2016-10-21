<?php

namespace Codecasts\Domains\Lessons\Database\Factories;

use Codecasts\Domains\Lessons\Track;
use Codecasts\Support\Domain\ModelFactory;

/**
 * Class TrackFactory.
 */
class TrackFactory extends ModelFactory
{
    protected $model = Track::class;

    public function fields()
    {
        $title = $this->faker->sentence(4);

        return [
            'slug'        => str_slug($title),
            'title'       => $title,
            'description' => $this->faker->sentence(10),
            'visible'     => $this->faker->boolean(50),
        ];
    }
}
