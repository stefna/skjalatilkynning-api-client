<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient\Endpoints;

use Stefna\ApiClientRuntime\Endpoint;
use Stefna\ApiClientRuntime\RequestBody\JsonData;
use SkjalatilkynningApiClient\Models\DocumentReferenceUpdate;
use Stefna\ApiClientRuntime\RequestBody;

class UpdateDocumentIndexEndpoint implements Endpoint
{
	public const PATH = '/api/v1/documentindexes';


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
		if ($this->requestBody instanceof RequestBody) {
			return $this->requestBody;
		}
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
		return 'PUT';
	}
}
