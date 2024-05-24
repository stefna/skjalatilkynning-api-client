<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient;

use DateTimeInterface;
use Ramsey\Uuid\UuidInterface;
use Stefna\ApiClientRuntime\AbstractService;
use SkjalatilkynningApiClient\Endpoints\GetCategoriesEndpoint;
use Stefna\ApiClientRuntime\OpenApi\Exceptions\UnknownResponse;
use SkjalatilkynningApiClient\Endpoints\GetTypesEndpoint;
use SkjalatilkynningApiClient\Endpoints\CreateDocumentsEndpoint;
use SkjalatilkynningApiClient\Models\Result;
use SkjalatilkynningApiClient\Models\Document;
use SkjalatilkynningApiClient\Endpoints\UpdateDocumentIndexEndpoint;
use SkjalatilkynningApiClient\Models\DocumentReferenceUpdate;
use SkjalatilkynningApiClient\Endpoints\CreateNotificationEndpoint;
use SkjalatilkynningApiClient\Models\Notification;
use SkjalatilkynningApiClient\Endpoints\WithdrawEndpoint;
use SkjalatilkynningApiClient\Models\DocumentWithdrawn;
use SkjalatilkynningApiClient\Endpoints\DocumentReadEndpoint;
use SkjalatilkynningApiClient\Models\DocumentRead;
use SkjalatilkynningApiClient\Endpoints\GetOutboundIPsEndpoint;
use SkjalatilkynningApiClient\Endpoints\GetPaperPreferenceEndpoint;
use SkjalatilkynningApiClient\Endpoints\GetPaperPreferenceListEndpoint;
use Stefna\ApiClientRuntime\ServerConfiguration\WriteableServerConfiguration;
use Stefna\ApiClientRuntime\ServerConfiguration\SecurityValue;
use Stefna\ApiClientRuntime\OpenApi\ModelResponseFactory;
use Stefna\ApiClientRuntime\ServerConfiguration\AuthSecurityValue;

class Service extends AbstractService implements ServiceInterface
{
	/**
	 * @return string[]
	 */
	public function getCategories(): array
	{
		$endpoint = new GetCategoriesEndpoint();
		$response = $this->doRequest($endpoint);
		$responseCode = $response->getStatusCode();
		if ($responseCode === 200) {
			$items = [];
			foreach ($this->parseJsonResponse($response) as $item) {
				$items[] = $item;
			}
			return $items;
		}
		throw new UnknownResponse($response);
	}

	/**
	 * @return string[]
	 */
	public function getTypes(): array
	{
		$endpoint = new GetTypesEndpoint();
		$response = $this->doRequest($endpoint);
		$responseCode = $response->getStatusCode();
		if ($responseCode === 200) {
			$items = [];
			foreach ($this->parseJsonResponse($response) as $item) {
				$items[] = $item;
			}
			return $items;
		}
		throw new UnknownResponse($response);
	}

	/**
	 * @param Document[] $requestBody
	 * @return Result[]
	 */
	public function createDocuments(array $requestBody): array
	{
		$endpoint = new CreateDocumentsEndpoint($requestBody);
		$response = $this->doRequest($endpoint);
		$responseCode = $response->getStatusCode();
		if ($responseCode === 200) {
			$items = [];
			foreach ($this->parseJsonResponse($response) as $item) {
				$items[] = Result::createFromResponse($item);
			}
			return $items;
		}
		throw new UnknownResponse($response);
	}

	/**
	 * @param DocumentReferenceUpdate[] $requestBody
	 * @return Result[]
	 */
	public function updateDocumentIndex(array $requestBody): array
	{
		$endpoint = new UpdateDocumentIndexEndpoint($requestBody);
		$response = $this->doRequest($endpoint);
		$responseCode = $response->getStatusCode();
		if ($responseCode === 200) {
			$items = [];
			foreach ($this->parseJsonResponse($response) as $item) {
				$items[] = Result::createFromResponse($item);
			}
			return $items;
		}
		throw new UnknownResponse($response);
	}

	/**
	 * @param Notification[] $requestBody
	 */
	public function createNotification(array $requestBody): object
	{
		$endpoint = new CreateNotificationEndpoint($requestBody);
		$response = $this->doRequest($endpoint);
		$responseCode = $response->getStatusCode();
		if ($responseCode === 200) {
			return $this->parseJsonResponse($response);
		}
		throw new UnknownResponse($response);
	}

	/**
	 * @param DocumentWithdrawn[] $requestBody
	 * @return Result[]
	 */
	public function withdraw(array $requestBody): array
	{
		$endpoint = new WithdrawEndpoint($requestBody);
		$response = $this->doRequest($endpoint);
		$responseCode = $response->getStatusCode();
		if ($responseCode === 200) {
			$items = [];
			foreach ($this->parseJsonResponse($response) as $item) {
				$items[] = Result::createFromResponse($item);
			}
			return $items;
		}
		throw new UnknownResponse($response);
	}

	/**
	 * @param DocumentRead[] $requestBody
	 * @return Result[]
	 */
	public function documentRead(array $requestBody): array
	{
		$endpoint = new DocumentReadEndpoint($requestBody);
		$response = $this->doRequest($endpoint);
		$responseCode = $response->getStatusCode();
		if ($responseCode === 200) {
			$items = [];
			foreach ($this->parseJsonResponse($response) as $item) {
				$items[] = Result::createFromResponse($item);
			}
			return $items;
		}
		throw new UnknownResponse($response);
	}

	public function getOutboundIPs(): object
	{
		$endpoint = new GetOutboundIPsEndpoint();
		$response = $this->doRequest($endpoint);
		$responseCode = $response->getStatusCode();
		if ($responseCode === 200) {
			return $this->parseJsonResponse($response);
		}
		throw new UnknownResponse($response);
	}

	public function getPaperPreference(string $kennitala): object
	{
		$endpoint = new GetPaperPreferenceEndpoint($kennitala);
		$response = $this->doRequest($endpoint);
		$responseCode = $response->getStatusCode();
		if ($responseCode === 200) {
			return $this->parseJsonResponse($response);
		}
		throw new UnknownResponse($response);
	}

	public function getPaperPreferenceList(?int $page = null, ?int $pageSize = null): object
	{
		$endpoint = new GetPaperPreferenceListEndpoint($page, $pageSize);
		$response = $this->doRequest($endpoint);
		$responseCode = $response->getStatusCode();
		if ($responseCode === 200) {
			return $this->parseJsonResponse($response);
		}
		throw new UnknownResponse($response);
	}

	public function setSecurityForBearerAuth(string $token): void
	{
		if ($this->serverConfiguration instanceof WriteableServerConfiguration) {
			$this->serverConfiguration->setSecurityValue('bearerAuth', AuthSecurityValue::bearer($token));
		}
	}

	public static function createWithSecurityValues(SecurityValue $bearerAuth): static
	{
		return static::create(new ServerConfiguration($bearerAuth));
	}
}
