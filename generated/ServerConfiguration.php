<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient;

use Stefna\ApiClientRuntime\ServerConfiguration\AbstractServerConfiguration;
use Stefna\ApiClientRuntime\ServerConfiguration\WriteableServerConfiguration;
use Stefna\ApiClientRuntime\OpenApi\SecuritySchemeFactory;
use Stefna\ApiClientRuntime\ServerConfiguration\SecurityScheme;
use Stefna\ApiClientRuntime\ServerConfiguration\SecurityValue;

class ServerConfiguration extends AbstractServerConfiguration implements WriteableServerConfiguration
{
	/** @var string[] */
	protected array $serverUris = [
		'Production' => 'https://skjalatilkynning-island-is.azurewebsites.net',
		'Development' => 'https://test-skjalatilkynning-island-is.azurewebsites.net',
	];
	protected string $selectedBaseUri = 'Production';
	/** @var SecurityScheme[] */
	protected array $securitySchemes = [];
	/** @var SecurityValue[] */
	protected array $securityValues = [];

	public function __construct(SecurityValue $bearerAuth)
	{
		$this->addSecurityScheme(SecuritySchemeFactory::createFromSchemeArray('bearerAuth', [
			'type' => 'http',
			'scheme' => 'bearer',
			'bearerFormat' => 'JWT',
		]));
		$this->setSecurityValue('bearerAuth', $bearerAuth);
	}

	public function getBaseUri(): string
	{
		return $this->serverUris[$this->selectedBaseUri];
	}

	public function selectServer(string $name): void
	{
		$this->selectedBaseUri = $name;
	}

	public function getSecurityScheme(string $ref): ?SecurityScheme
	{
		return $this->securitySchemes[$ref] ?? null;
	}

	public function addSecurityScheme(SecurityScheme $securityScheme): void
	{
		$this->securitySchemes[$securityScheme->getRef()] = $securityScheme;
	}

	public function getSecurityValue(string $ref): ?SecurityValue
	{
		return $this->securityValues[$ref] ?? null;
	}

	public function setSecurityValue(string $ref, SecurityValue $value): void
	{
		$this->securityValues[$ref] = $value;
	}
}
