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

interface ServiceInterface
{
	/**
	 * @return string[]
	 */
	public function getCategories(): array;

	/**
	 * @return string[]
	 */
	public function getTypes(): array;

	/**
	 * @param Document[] $requestBody
	 * @return Result[]
	 */
	public function createDocuments(array $requestBody): array;

	/**
	 * @param DocumentReferenceUpdate[] $requestBody
	 * @return Result[]
	 */
	public function updateDocumentIndex(array $requestBody): array;

	/**
	 * @param Notification[] $requestBody
	 */
	public function createNotification(array $requestBody): object;

	/**
	 * @param DocumentWithdrawn[] $requestBody
	 * @return Result[]
	 */
	public function withdraw(array $requestBody): array;

	/**
	 * @param DocumentRead[] $requestBody
	 * @return Result[]
	 */
	public function documentRead(array $requestBody): array;

	public function getOutboundIPs(): object;

	public function getPaperPreference(string $kennitala): object;

	public function getPaperPreferenceList(?int $page = null, ?int $pageSize = null): object;

	public function setSecurityForBearerAuth(string $token): void;

	public static function createWithSecurityValues(SecurityValue $bearerAuth): static;
}
