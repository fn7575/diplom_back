#!/bin/bash

apt install -y \
    curl unzip
    php-cli php-pgsql php-pdo php-mbstring php-json php-xml php-zip php-tokenizer php-curl

curl -sS https://getcomposer.org/installer -o composer-setup.php
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
