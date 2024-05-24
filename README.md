# Skjalatilkynning Api Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stefna/di.svg)](https://packagist.org/packages/stefna/di)
[![Software License](https://img.shields.io/github/license/stefna/di.svg)](LICENSE)

Library to communicate with Island.is mailbox ([Pósthólf](https://docs.devland.is/products/postholf/postholf-02-interface-skjalatilkynning))

## Usage

To create an api-client you will need 2 classes

First is a `ServerConfiguration` class that contains information about the api you want to connect to

Example:

The simple way is to use the static `create` method.

But for that method to work you need to have `nyholm/psr7` and `kriswallsmith/buzz` installed since that's the default
psr implementations we use

```php
$config = new SkjalatilkynningApiClient\ServerConfiguration(
	AuthSecurityValue::bearer('token')
);
$config->selectServer('Production');
$service = SkjalatilkynningApiClient\Service::create($config);


$response = $service->createDocuments(
	[
		new Document(
			kennitala: '1234567890',
			documentId: 'd07c8233-0664-48ad-87a3-caf01dbecdd2',
			senderKennitala: '4234567890',
			senderName: 'Sender name',
			category: 'category',
			subject: 'subject',
			documentDate: new DateTimeImmutable(),
		)
	]
);
```

### Create with custom psr implementations

If you want you can provide your own Client and Request implementations

```php
$service = new Service(
	new ServerConfiguration(...),
	new GuzzleHttp\Client(),
	new GuzzleHttp\Psr7\HttpFactory(),
);
```

## License

View the [LICENSE](LICENSE) file attach to this project.
