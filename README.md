USAePay PHP SDK

## Requirements

PHP 5.5 and later

Composer

## Installation & Usage

### Composer

To install run `composer require usaepay/usaepay-php`
then run `composer install`

Or clone git and run `composer install` within the project directory

### Dependencies

- curl
- json
- mbstring
- guzzlehttp/guzzle

## Getting Started

After following installation instructions run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

USAePay\API::setAuthentication('Enter_API_Key_Here','Enter_API_Pin_Here');

$result=USAePay\Batches::get();

?>
```

## Author

706@usaepay.com

