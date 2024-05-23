<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient;

use DateTimeInterface;
use Ramsey\Uuid\UuidInterface;
use Stefna\ApiClientRuntime\AbstractService;
use SkjalatilkynningApiClient\Endpoints\GetCategoriesEndpoint;
use Stefna\ApiClientRuntime\OpenApi\Exceptions\UnknownResponse;
use SkjalatilkynningApiClient\Endpoints\GetTypesEndpoint;
use SkjalatilkynningApiClient\Endpoints\CreateDocumentEndpoint;
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
	public function GetCategories(): array;

	/**
	 * @return string[]
	 */
	public function GetTypes(): array;

	/**
	 * @param Document[] $requestBody
	 * @return Result[]
	 */
	public function CreateDocument(array $requestBody): array;

	/**
	 * @param DocumentReferenceUpdate[] $requestBody
	 * @return Result[]
	 */
	public function UpdateDocumentIndex(array $requestBody): array;

	/**
	 * @param Notification[] $requestBody
	 */
	public function CreateNotification(array $requestBody): object;

	/**
	 * @param DocumentWithdrawn[] $requestBody
	 * @return Result[]
	 */
	public function Withdraw(array $requestBody): array;

	/**
	 * @param DocumentRead[] $requestBody
	 * @return Result[]
	 */
	public function DocumentRead(array $requestBody): array;

	public function GetOutboundIPs(): object;

	public function GetPaperPreference(string $kennitala): object;

	public function GetPaperPreferenceList(?int $page = null, ?int $pageSize = null): object;

	public function setSecurityForBearerAuth(string $token): void;

	public static function createWithSecurityValues(SecurityValue $bearerAuth): static;
}
