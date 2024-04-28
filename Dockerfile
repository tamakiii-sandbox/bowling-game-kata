FROM php:8.2-cli AS production

RUN apt update -y && \
    apt install -y --no-install-recommends \
      git \
      make \
      && \
    apt clean all && \
    rm -r /var/lib/apt/lists/*

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php --install-dir=/bin --filename=composer --version=2.7.4 && \
    php -r "unlink('composer-setup.php');"

# --

FROM production AS development

RUN apt update -y && \
    apt install -y --no-install-recommends \
      libzip-dev \
      zlib1g-dev \
      && \
    apt clean all && \
    rm -r /var/lib/apt/lists/*

RUN pecl install xdebug && docker-php-ext-enable xdebug
