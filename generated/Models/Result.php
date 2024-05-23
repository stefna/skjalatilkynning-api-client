<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient\Models;

use Starburst\Utils\Traits\GetArrayCopyTrait;
use Stefna\ApiClientRuntime\OpenApi\ModelResponseFactory;
use IteratorAggregate;
use ArrayIterator;
use Stefna\ApiClientRuntime\RequestBody;
use JsonSerializable;

class Result implements
	ModelResponseFactory,
	IteratorAggregate,
	RequestBody,
	JsonSerializable
{
	use GetArrayCopyTrait;

	private ?bool $success = null;
	/** @var string[] */
	private array $errors = [];

	public function isSuccess(): ?bool
	{
		return $this->success;
	}

	public function setSuccess(bool $success): void
	{
		$this->success = $success;
	}

	public function addError(string $error): void
	{
		$this->errors[] = $error;
	}

	/**
	 * @return string[]
	 */
	public function getErrors(): array
	{
		return $this->errors;
	}

	/**
	 * @param string[] $errors
	 */
	public function setErrors(array $errors): void
	{
		$this->errors = $errors;
	}

	/**
	 * @return ArrayIterator<int, string>
	 */
	public function getIterator(): ArrayIterator
	{
		return new \ArrayIterator($this->errors);
	}

	final public static function createFromResponse(mixed $data): static
	{
		$self = new self();
		if (isset($data['success']) && $data['success'] !== null) {
			$self->success = (bool)$data['success'];
		}
		if (isset($data['errors']) && $data['errors'] !== null) {
			$self->errors = $data['errors'];
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
