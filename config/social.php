<?php

return [

    'parsers' => [
        'facebook' => \Codecasts\Domains\Users\Parsers\FacebookParser::class,
        'github'   => \Codecasts\Domains\Users\Parsers\GithubParser::class,
        'google'   => \Codecasts\Domains\Users\Parsers\GoogleParser::class,
    ],

];
