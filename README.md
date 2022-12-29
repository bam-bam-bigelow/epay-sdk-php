USAePay PHP SDK
version 2.1.6

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

## Getting Started

After following installation instructions run the following:

```
<?php
require_once(__DIR__ . '/vendor/autoload.php');

USAePay\API::setAuthentication('Enter_API_Key_Here','Enter_API_Pin_Here');

$result=USAePay\Transactions::get();
?>
```

## Author

706@usaepay.com
