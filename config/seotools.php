<?php

return [
    'meta' => [

        'defaults' => [
            'title' => env('SEO_TITLE', 'CODECASTS'),
            'description' => env('SEO_DESCRIPTION', 'Comece a aprender hoje!'),
            'separator' => ' - ',
            'keywords' => [],
            'canonical' => false,
        ],

        'webmaster_tags' => [
            'google' => null,
            'bing' => null,
            'alexa' => null,
            'pinterest' => null,
            'yandex' => null,
        ],
    ],
    'opengraph' => [

        'defaults' => [
            'title' => env('SEO_TITLE', 'CODECASTS'),
            'description' => env('SEO_DESCRIPTION', 'Comece a aprender hoje!'),
            'url' => false,
            'type' => false,
            'site_name' => false,
            'images' => [],
        ],
    ],
    'twitter' => [
        'defaults' => [
            //'card'        => null,
            //'site'        => null,
        ],
    ],
];
