## System Requirements

* composer
* npm (and node)
* gulp
* bower

OS X with [homebrew](http://brew.sh/) instructions:

Composer:
```
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
```

Node & npm:
```
brew install node
curl -sS https://www.npmjs.org/install.sh | sh
```

Gulp & Bower:
```
npm install -g gulp
npm install -g bower
```


## Install
```
composer install
npm install
bower install
gulp build --fast
```

Build should be run without `--fast` on production, as css output is not perfect using libsass. Table styles are only correct if run with ruby-sass.

### Watch CSS with libsass
```
gulp watch --fast
```

### Watch CSS with ruby sass
```
gulp watch
```

### Update Wordpress/plugins
```
composer update
```


## WordPress set up

Copy the file from:
`/deploy/development/wp-config.php`

and move to:
`/web/wp-config.php`


## Example local config

DocumentRoot should be set to `/web/`

For example in vhosts conf:
```
DocumentRoot "/var/www/web/"
```
