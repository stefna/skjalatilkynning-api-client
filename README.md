# Skjalatilkynning Api Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stefna/skjalatilkynning-api-client.svg)](https://packagist.org/packages/stefna/skjalatilkynning-api-client)
[![Software License](https://img.shields.io/github/license/stefna/skjalatilkynning-api-client.svg)](LICENSE)

Library to communicate with Island.is mailbox ([Pósthólf](https://docs.devland.is/products/postholf/postholf-02-interface-skjalatilkynning))

## Installation

```
composer require stefna/skjalatilkynning-api-client
```

## Usage

### Setup

*Remember to install a PSR-7, PSR-17 and PSR-18*

We recommend `nyholm/psr7` and `kriswallsmith/buzz` to fill does interfaces. 
If does packages are installed the api-client will auto wire the clients and factories.

**Setup for production use**
```php
$bearerToken = AuthSecurityValue::bearer('token');
$service = \SkjalatilkynningApiClient\Service::createWithSecurityValues($bearerToken);
```

**Setup for testing use**
```php
$bearerToken = AuthSecurityValue::bearer('token');
$config = new SkjalatilkynningApiClient\ServerConfiguration($bearerToken);
$config->selectServer('Development');
$service = SkjalatilkynningApiClient\Service::create($config);
```


**Setup with custom psr implementations**
```php
$bearerToken = AuthSecurityValue::bearer('token');
$service = new SkjalatilkynningApiClient\Service(
	new SkjalatilkynningApiClient\ServerConfiguration($bearerToken),
	new GuzzleHttp\Client(),
	new GuzzleHttp\Psr7\HttpFactory(),
);
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
