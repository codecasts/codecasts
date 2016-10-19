<?php

namespace Codecasts\Domains\Lessons\Database\Factories;

use Codecasts\Domains\Lessons\Serie;
use Codecasts\Support\Domain\ModelFactory;

/**
 * Class SerieFactory.
 */
class SerieFactory extends ModelFactory
{
    protected $model = Serie::class;

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
