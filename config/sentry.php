<?php

return [
    // Private DSN
    'dsn' => env('SENTRY_DSN'),

    // Public DSN (for Javascript)
    'public_dsn' => env('SENTRY_PUBLIC_DSN'),

    // capture release as git sha
    'release' => file_exists(base_path('.version')) ? file_get_contents(base_path('.version')) : null,
];
