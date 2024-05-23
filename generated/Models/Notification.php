<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient\Models;

use Starburst\Utils\Traits\GetArrayCopyTrait;
use Stefna\ApiClientRuntime\OpenApi\ModelResponseFactory;
use DateTimeInterface;
use DateTimeImmutable;
use IteratorAggregate;
use ArrayIterator;
use Stefna\ApiClientRuntime\RequestBody;
use JsonSerializable;

class Notification implements
	ModelResponseFactory,
	IteratorAggregate,
	RequestBody,
	JsonSerializable
{
	use GetArrayCopyTrait;


	/**
	 * @param mixed[] $templateArguments
	 */
	public function __construct(
		private string $kennitala,
		private string $senderKennitala,
		private string $templateId,
		private array $templateArguments = [],
		private ?bool $sendEmail = null,
		private ?DateTimeInterface $publicationDate = null,
	) {}

	public function getKennitala(): string
	{
		return $this->kennitala;
	}

	public function setKennitala(string $kennitala): void
	{
		$this->kennitala = $kennitala;
	}

	public function getSenderKennitala(): string
	{
		return $this->senderKennitala;
	}

	public function setSenderKennitala(string $senderKennitala): void
	{
		$this->senderKennitala = $senderKennitala;
	}

	public function getTemplateId(): string
	{
		return $this->templateId;
	}

	public function setTemplateId(string $templateId): void
	{
		$this->templateId = $templateId;
	}

	public function addTemplateArgument(string $key, $value): void
	{
		$this->templateArguments[$key] = $value;
	}

	/**
	 * @return mixed[]
	 */
	public function getTemplateArguments(): array
	{
		return $this->templateArguments;
	}

	/**
	 * @param mixed[] $templateArguments
	 */
	public function setTemplateArguments(array $templateArguments): void
	{
		$this->templateArguments = $templateArguments;
	}

	public function isSendEmail(): ?bool
	{
		return $this->sendEmail;
	}

	public function setSendEmail(bool $sendEmail): void
	{
		$this->sendEmail = $sendEmail;
	}

	public function getPublicationDate(): ?DateTimeInterface
	{
		return $this->publicationDate;
	}

	public function setPublicationDate(DateTimeInterface $publicationDate): void
	{
		$this->publicationDate = $publicationDate;
	}

	/**
	 * @return ArrayIterator<int, mixed>
	 */
	public function getIterator(): ArrayIterator
	{
		return new \ArrayIterator($this->templateArguments);
	}

	final public static function createFromResponse(mixed $data): static
	{
		$kennitala = $data['kennitala'];
		$senderKennitala = $data['senderKennitala'];
		$templateId = $data['templateId'];
		$self = new self($kennitala, $senderKennitala, $templateId);
		if (isset($data['templateArguments']) && $data['templateArguments'] !== null) {
			$self->templateArguments = $data['templateArguments'];
		}
		if (isset($data['sendEmail']) && $data['sendEmail'] !== null) {
			$self->sendEmail = (bool)$data['sendEmail'];
		}
		if (isset($data['publicationDate']) && $data['publicationDate'] !== null) {
			$self->publicationDate = new DateTimeImmutable($data['publicationDate']);
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
