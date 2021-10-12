# A simple API for working with attributes in PHP.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ryangjchandler/attributes.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/attributes)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/attributes/run-tests?label=tests)](https://github.com/ryangjchandler/attributes/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/attributes/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ryangjchandler/attributes/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ryangjchandler/attributes.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/attributes)

This package provides an improved API for working with [attributes](https://www.php.net/manual/en/language.attributes.overview.php) in PHP 8.0+.

## Support development

If you would like to support the on going maintenance and development of this package, please consider [sponsoring me on GitHub](https://github.com/sponsors/ryangjchandler).

## Installation

You can install the package via composer:

```bash
composer require ryangjchander/attributes
```

## Usage

```php
$skeleton = new RyanChandler\Attributes();
echo $skeleton->echoPhrase('Hello, world!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/ryangjchandler)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
