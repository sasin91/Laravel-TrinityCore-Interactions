# Laravel 5 Interactions for TrinityCore.

## Installation

### Composer

Execute the following command to get the latest version of the package:

```terminal
composer require sasin91/laravel-tc-interaction
```

Note, to pull this in you might need to set your minimum stability in composer.json
```composer.json
"minimum-stability":"dev",
```

### Laravel

In your `config/app.php` add 

`Sasin91\LaravelInteractions\InteractionServiceProvider::class`
`Sasin91\LaravelTrinityCoreInteractions\TrinityCoreInteractionsServiceProvider::class`

 to the end of the `Package Service Providers` array:

```php
'providers' => [
    ...
    Sasin91\LaravelInteractions\InteractionServiceProvider::class,
    Sasin91\LaravelTrinityCoreInteractions\TrinityCoreInteractionsServiceProvider::class,
],
```