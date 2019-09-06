USAePay PHP SDK

## Requirements

PHP 5.5 and later

Composer

## Installation & Usage

### Composer

To install run `composer install usaepay/usaepay-php`

Or download and run `composer install` within the project directory

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

