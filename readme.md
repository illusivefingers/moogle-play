## Moogle Play

Moogle Play is a fictitious music experience app designed to demonstrate proficiency with the Laravel framework as well as common design patterns in enterprise applications, while acting as a sandbox for trying out features of Laravel and other technologies common to web applications.

## Install

* Clone repo into desired directory on host machine
* Fire up VM (preferably Homestead) with configured paths to project
* Copy /environment.sample.php to /environment.php and edit values
* Copy /.env.environment.sample.php to .env.[environment-name].php and edit values
* Navigate to install folder inside the VM
* Run the following commands:

``` bash
$ composer install
$ composer dump-autoload
$ php artisan migrate --seed
```

## Requirements

PHP 5.5+ is required for this version.

## Documentation

Moogle Play has no documentation as of this time.

## Credits

- [Nathan Norton](https://github.com/illusivefingers)

## License

The MIT License (MIT). Please see [License File](https://github.com/illusivefingers/moogle-play/blob/master/LICENSE) for more information.