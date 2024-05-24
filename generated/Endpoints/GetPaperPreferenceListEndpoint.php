<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient\Endpoints;

use Stefna\ApiClientRuntime\Endpoint;
use Stefna\ApiClientRuntime\RequestBody\JsonData;
use Stefna\ApiClientRuntime\RequestBody;

class GetPaperPreferenceListEndpoint implements Endpoint
{
	public const PATH = '/api/v1/paper';


	public function __construct(
		private ?int $page = null,
		private ?int $pageSize = null,
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
		$query = [];
		$query['page'] = $this->page;
		$query['pageSize'] = $this->pageSize;
		return array_filter($query, fn ($v) => $v !== null);
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
