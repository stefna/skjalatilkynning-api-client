<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient\Endpoints;

use Stefna\ApiClientRuntime\Endpoint;
use SkjalatilkynningApiClient\Models\DocumentWithdrawn;
use Stefna\ApiClientRuntime\RequestBody;

class WithdrawEndpoint implements Endpoint
{
	public const PATH = '/api/v1/documentindexes/withdraw';


	public function __construct(
		private array|RequestBody $requestBody,
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
		$return = [];
		foreach ($this->requestBody as $key => $value) {
			if ($value instanceof RequestBody) {
				$return[] = $value;
			}
		}
		return new JsonData($return);
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
		return 'POST';
	}
}
