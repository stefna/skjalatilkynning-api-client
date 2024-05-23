<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient\Models;

use Starburst\Utils\Traits\GetArrayCopyTrait;
use Stefna\ApiClientRuntime\OpenApi\ModelResponseFactory;
use Stefna\ApiClientRuntime\RequestBody;
use JsonSerializable;

class DocumentReferenceUpdate implements
	ModelResponseFactory,
	RequestBody,
	JsonSerializable
{
	use GetArrayCopyTrait;

	private ?string $documentId = null;
	private ?string $updatedDocumentId = null;
	private ?string $kennitala = null;

	public function getDocumentId(): ?string
	{
		return $this->documentId;
	}

	public function setDocumentId(string $documentId): void
	{
		$this->documentId = $documentId;
	}

	public function getUpdatedDocumentId(): ?string
	{
		return $this->updatedDocumentId;
	}

	public function setUpdatedDocumentId(string $updatedDocumentId): void
	{
		$this->updatedDocumentId = $updatedDocumentId;
	}

	public function getKennitala(): ?string
	{
		return $this->kennitala;
	}

	public function setKennitala(string $kennitala): void
	{
		$this->kennitala = $kennitala;
	}

	final public static function createFromResponse(mixed $data): static
	{
		$self = new self();
		if (isset($data['documentId']) && $data['documentId'] !== null) {
			$self->documentId = $data['documentId'];
		}
		if (isset($data['updatedDocumentId']) && $data['updatedDocumentId'] !== null) {
			$self->updatedDocumentId = $data['updatedDocumentId'];
		}
		if (isset($data['kennitala']) && $data['kennitala'] !== null) {
			$self->kennitala = $data['kennitala'];
		}
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
