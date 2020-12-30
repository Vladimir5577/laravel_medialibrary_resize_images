In the project folder to install media library with command

	$ composer require "spatie/laravel-medialibrary:^8.0.0"


The package will automatically register a service provider.
You need to publish and run the migration:

	$ php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="migrations"

	$ php artisan migrate

Publishing the config file is optional:

	$ php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="config"

Generate storage link

	$ php artisan storage:link


===============================================================================

Testing

Run test

	$ ./vendor/bin/phpunit <name>