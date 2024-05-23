<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient\Models;

use Starburst\Utils\Traits\GetArrayCopyTrait;
use Stefna\ApiClientRuntime\OpenApi\ModelResponseFactory;
use Stefna\ApiClientRuntime\RequestBody;
use JsonSerializable;

class DocumentRead implements
	ModelResponseFactory,
	RequestBody,
	JsonSerializable
{
	use GetArrayCopyTrait;


	public function __construct(
		private string $kennitala,
		private string $documentId,
	) {}

	public function getKennitala(): string
	{
		return $this->kennitala;
	}

	public function setKennitala(string $kennitala): void
	{
		$this->kennitala = $kennitala;
	}

	public function getDocumentId(): string
	{
		return $this->documentId;
	}

	public function setDocumentId(string $documentId): void
	{
		$this->documentId = $documentId;
	}

	final public static function createFromResponse(mixed $data): static
	{
		$kennitala = $data['kennitala'];
		$documentId = $data['documentId'];
		$self = new self($kennitala, $documentId);
		return $self;
	}

	public function getContentType(): string
	{
		return 'application/json';
	}

	final public function getRequestBody(): string
	{
		return json_encode($this->getArrayCopy(), JSON_THROW_ON_ERROR);
	}

	public function jsonSerialize(): mixed
	{
		return $this->getArrayCopy();
	}
}
