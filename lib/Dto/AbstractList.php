<?php

declare(strict_types=1);

namespace USAePay\Dto;

use USAePay\Interface\ListInterface;
use USAePay\Interface\ResponseInterface;

abstract class AbstractList implements ResponseInterface, ListInterface
{
	public const TYPE_LIST = 'list';

	/**
	 * @var string|mixed|null The type of object returned. Returns a list.
	 */
	public string $type;

	/**
	 * @var int|null The total amount of elements, including filtering results.
	 */
	public ?int $total;

	/**
	 * @var array An array of elements matching the search.
	 */
	public array $data = [];

	/**
	 * @var int|null The number of elements skipped from the results.
	 */
	public ?int $offset;

	/**
	 * @var int|null The maximum amount of elements that will be included.
	 */
	public ?int $limit;

	public function __construct(array $response) {
		if (($response['type'] ?? '') !== self::TYPE_LIST) {
			throw new \InvalidArgumentException('Invalid type, expected "list"');
		}
		$this->type = self::TYPE_LIST;

		$this->limit = $response['limit'] ? (int)$response['limit'] : null;
		$this->offset = $response['offset'] ? (int)$response['offset'] : null;
		$this->total = $response['total'] ? (int)$response['total'] : null;

		// transform data into BatchListItem objects
		foreach ($response['data'] as $key => $value) {
			if (is_array($value)) {
				$className = static::getDataClassName();
				$this->data[$key] = new $className($value);
			}
		}
	}

	public function getType(): string {
		return $this->type;
	}

	abstract public function getDataClassName(): string;

	public function getData(): array {
		return $this->data;
	}
}