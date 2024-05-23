<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient\Models;

use Starburst\Utils\Traits\GetArrayCopyTrait;
use Stefna\ApiClientRuntime\OpenApi\ModelResponseFactory;
use DateTimeInterface;
use DateTimeImmutable;
use Stefna\ApiClientRuntime\RequestBody;
use JsonSerializable;

class Document implements
	ModelResponseFactory,
	RequestBody,
	JsonSerializable
{
	use GetArrayCopyTrait;


	public function __construct(
		private string $kennitala,
		private string $documentId,
		private string $senderKennitala,
		private string $senderName,
		private string $category,
		private string $subject,
		private DateTimeInterface $documentDate,
		private ?string $authorKennitala = null,
		private ?string $caseId = null,
		private ?string $type = null,
		private ?string $subType = null,
		private ?DateTimeInterface $publicationDate = null,
		private ?bool $notifyOwner = null,
		private ?string $minimumAuthenticationType = null,
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

	public function getSenderKennitala(): string
	{
		return $this->senderKennitala;
	}

	public function setSenderKennitala(string $senderKennitala): void
	{
		$this->senderKennitala = $senderKennitala;
	}

	public function getSenderName(): string
	{
		return $this->senderName;
	}

	public function setSenderName(string $senderName): void
	{
		$this->senderName = $senderName;
	}

	public function getAuthorKennitala(): ?string
	{
		return $this->authorKennitala;
	}

	public function setAuthorKennitala(string $authorKennitala): void
	{
		$this->authorKennitala = $authorKennitala;
	}

	public function getCaseId(): ?string
	{
		return $this->caseId;
	}

	public function setCaseId(string $caseId): void
	{
		$this->caseId = $caseId;
	}

	public function getCategory(): string
	{
		return $this->category;
	}

	public function setCategory(string $category): void
	{
		$this->category = $category;
	}

	public function getType(): ?string
	{
		return $this->type;
	}

	public function setType(string $type): void
	{
		$this->type = $type;
	}

	public function getSubType(): ?string
	{
		return $this->subType;
	}

	public function setSubType(string $subType): void
	{
		$this->subType = $subType;
	}

	public function getSubject(): string
	{
		return $this->subject;
	}

	public function setSubject(string $subject): void
	{
		$this->subject = $subject;
	}

	public function getDocumentDate(): DateTimeInterface
	{
		return $this->documentDate;
	}

	public function setDocumentDate(DateTimeInterface $documentDate): void
	{
		$this->documentDate = $documentDate;
	}

	public function getPublicationDate(): ?DateTimeInterface
	{
		return $this->publicationDate;
	}

	public function setPublicationDate(DateTimeInterface $publicationDate): void
	{
		$this->publicationDate = $publicationDate;
	}

	public function isNotifyOwner(): ?bool
	{
		return $this->notifyOwner;
	}

	public function setNotifyOwner(bool $notifyOwner): void
	{
		$this->notifyOwner = $notifyOwner;
	}

	public function getMinimumAuthenticationType(): ?string
	{
		return $this->minimumAuthenticationType;
	}

	public function setMinimumAuthenticationType(string $minimumAuthenticationType): void
	{
		$this->minimumAuthenticationType = $minimumAuthenticationType;
	}

	final public static function createFromResponse(mixed $data): static
	{
		$kennitala = $data['kennitala'];
		$documentId = $data['documentId'];
		$senderKennitala = $data['senderKennitala'];
		$senderName = $data['senderName'];
		$category = $data['category'];
		$subject = $data['subject'];
		$documentDate = new DateTimeImmutable($data['documentDate']);
		$self = new self($kennitala, $documentId, $senderKennitala, $senderName, $category, $subject, $documentDate);
		if (isset($data['authorKennitala']) && $data['authorKennitala'] !== null) {
			$self->authorKennitala = $data['authorKennitala'];
		}
		if (isset($data['caseId']) && $data['caseId'] !== null) {
			$self->caseId = $data['caseId'];
		}
		if (isset($data['type']) && $data['type'] !== null) {
			$self->type = $data['type'];
		}
		if (isset($data['subType']) && $data['subType'] !== null) {
			$self->subType = $data['subType'];
		}
		if (isset($data['publicationDate']) && $data['publicationDate'] !== null) {
			$self->publicationDate = new DateTimeImmutable($data['publicationDate']);
		}
		if (isset($data['notifyOwner']) && $data['notifyOwner'] !== null) {
			$self->notifyOwner = (bool)$data['notifyOwner'];
		}
		if (isset($data['minimumAuthenticationType']) && $data['minimumAuthenticationType'] !== null) {
			$self->minimumAuthenticationType = $data['minimumAuthenticationType'];
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
