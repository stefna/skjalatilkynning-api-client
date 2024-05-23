<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient\Models;

use Starburst\Utils\Traits\GetArrayCopyTrait;
use Stefna\ApiClientRuntime\OpenApi\ModelResponseFactory;
use Stefna\ApiClientRuntime\RequestBody;
use JsonSerializable;

class DocumentWithdrawn implements
	ModelResponseFactory,
	RequestBody,
	JsonSerializable
{
	use GetArrayCopyTrait;

	private ?string $kennitala = null;
	private ?string $documentId = null;
	private ?string $reason = null;

	public function getKennitala(): ?string
	{
		return $this->kennitala;
	}

	public function setKennitala(string $kennitala): void
	{
		$this->kennitala = $kennitala;
	}

	public function getDocumentId(): ?string
	{
		return $this->documentId;
	}

	public function setDocumentId(string $documentId): void
	{
		$this->documentId = $documentId;
	}

	public function getReason(): ?string
	{
		return $this->reason;
	}

	public function setReason(string $reason): void
	{
		$this->reason = $reason;
	}

	final public static function createFromResponse(mixed $data): static
	{
		$self = new self();
		if (isset($data['kennitala']) && $data['kennitala'] !== null) {
			$self->kennitala = $data['kennitala'];
		}
		if (isset($data['documentId']) && $data['documentId'] !== null) {
			$self->documentId = $data['documentId'];
		}
		if (isset($data['reason']) && $data['reason'] !== null) {
			$self->reason = $data['reason'];
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
