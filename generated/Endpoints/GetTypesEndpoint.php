<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient\Endpoints;

use Stefna\ApiClientRuntime\Endpoint;
use Stefna\ApiClientRuntime\RequestBody\JsonData;
use Stefna\ApiClientRuntime\RequestBody;

class GetTypesEndpoint implements Endpoint
{
	public const PATH = '/api/v1/documentindexes/types';

	public function __construct(
	) {}

	public function getPath(): string
	{
		return self::PATH;
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
