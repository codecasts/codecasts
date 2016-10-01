#!/bin/bash

# fails when error any of the next commands
set -e

# Run PHPUnit Tests
phpdbg -qrr ./vendor/bin/phpunit --colors=never --coverage-text

# Send Coverage Reports
if [ $TRAVIS_PULL_REQUEST == false ]; then
    bash <(curl -s https://codecov.io/bash) -f coverage.xml -C$TRAVIS_COMMIT -B$TRAVIS_BRANCH -b$TRAVIS_BUILD_NUMBER -t$CODECOV_TOKEN
fi
