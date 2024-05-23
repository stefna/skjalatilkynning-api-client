<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient\Endpoints;

use Stefna\ApiClientRuntime\Endpoint;
use Stefna\ApiClientRuntime\RequestBody;

class GetPaperPreferenceEndpoint implements Endpoint
{
	public const PATH = '/api/v1/{kennitala}/paper';


	public function __construct(
		private string $kennitala,
	) {}

	public function getPath(): string
	{
		$replace = [
			'{kennitala}' => $this->kennitala,
		];
		return str_replace(array_keys($replace), array_values($replace), self::PATH);
	}

	/**
	 * @return array<string, string>
	 */
	public function getQueryParams(): array
	{
		return [];
	}

	/**
	 * @return array<string, string>
	 */
	public function getHeaders(): array
	{
		return [];
	}

	public function getRequestBody(): ?RequestBody
	{
		return null;
	}

	public function getDefaultSecurity(): string
	{
		return 'bearerAuth';
	}

	/**
	 * @return string[]
	 */
	public function getSecurity(): array
	{
		return [];
	}

	public function getMethod(): string
	{
		return 'GET';
	}
}
