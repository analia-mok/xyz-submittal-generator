# XYZ Submittal Generator

## Technologies

* Laravel 9.x
* Laravel Livewire
* AlpineJS
* Blade UI Kit Icons

## Project Setup

* Install the latest stable version of [Lando (v.3.6.2)](https://github.com/lando/lando/releases)
* Have the latest Docker Desktop v3.6.x installed
  * If you've installed Docker via Lando, you'll be fine.
* Clone this repo and cd into it
* Copy the given `.env.example` into your own `.env` file
  * If you are using the provided lando configuration, your local database, mailhog, and redis settings will already be available.

* Run `lando start`
* Run `lando setup`
  * This is a one-time setup script that will run:
    * composer install
    * Generates and sets your application key
    * Runs seeders which will provide you with sample data to work with
    * `php artisan storage:link` which will setup a symlink your public disk

* Run `lando npm install`
* Run `lando npm run prod`
* You should now be good to visit https://xyz-submittal-generator.lndo.site :tada:

## Available Commands

To ensure you are using the most compatible tooling versions, it is recommended
to run all commands through `lando`

### Composer

Run *composer* commands via:

```
lando composer
```

### Artisan

Run *artisan* commands via:

```
lando artisan
```

### NPM

Run *npm* commands via:

```
lando npm
```

For development, use:

```
lando npm run dev
```

For production, use:

```
lando npm run prod
```

### Xdebug

By default, xdebug will be enabled on `lando start`. But if you have a need for speed,
and don't need debugging enabled, you can run:

```
lando xdebug-off
```

Similarly, xdebug can be toggled back on using:

```
lando xdebug-on
```
