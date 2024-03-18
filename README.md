# Laravel Model attribute to de/compress the value

[![Latest Version on Packagist](https://img.shields.io/packagist/v/syberisle/laravel-castable-archive.svg?style=flat-square)](https://packagist.org/packages/syberisle/laravel-castable-archive)
[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/syberisle/laravel-castable-archive/run-tests.yml?branch=main&label=Tests)](https://github.com/syberisle/laravel-castable-archive/actions/workflows/tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/syberisle/laravel-castable-archive.svg?style=flat-square)](https://packagist.org/packages/syberisle/laravel-castable-archive)

This package allows you to cast a model attribute as a compressed value using either gzip or bzip.

Available Casts:
- `SyberIsle\Laravel\Cast\Archive\BzArchive`
- `SyberIsle\Laravel\Cast\Archive\GzArchive`

## Installation

```shell
composer install syberisle/laravel-castable-archive
```

## Usage

```php
use SyberIsle\Laravel\Cast\Archive;

class MyModel
{
    protected $casts = [
      'field_name' => Archive\GzArchive::class
    ];
}

$model->field_name = 'kakaw' // raw attribute = b"ËNÌN,\x07\x00"
$value = $model->field_name; // = 'kakaw'
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information about recent changes.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you've found a bug regarding security please report it via the security tab of this repository.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.