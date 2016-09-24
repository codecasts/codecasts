# Use ambientum php+caddy image
FROM ambientum/php:7.0-caddy

# copy repo data to inside the container
COPY . /var/www/app

# make sure its owned by the php-user
RUN sudo chown -R php-user:php-user /var/www/app

# install the dependencies (mainly composer deps)
RUN cd /var/www/app && \
    composer install --no-interaction --no-progress --prefer-dist

