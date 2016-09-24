#!/bin/bash

# fails when error any of the next commands
set -e

# Copy over testing configuration.
cp .env.testing .env

# Generate an application key.
php artisan key:generate

# Run PHPUnit Tests
phpdbg -qrr ./vendor/bin/phpunit --colors=never --coverage-text

# Send Coverage Reports
bash <(curl -s https://codecov.io/bash) -f coverage.xml -C$TRAVIS_COMMIT -B$TRAVIS_BRANCH -b$TRAVIS_BUILD_NUMBER -t$CODECOV_TOKEN