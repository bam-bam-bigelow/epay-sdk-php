<?php

declare(strict_types=1);

namespace USAePay\Dto\Response;

use USAePay\Dto\Batches\BatchListItem;
use USAePay\Interface\ResponseInterface;

class BatchesList implements ResponseInterface
{
	public const TYPE_LIST = 'list';

	/**
	 * @var string|mixed|null The type of object returned. Returns a list.
	 */
	public string $type;

	/**
	 * @var int|null The total amount of batches, including filtering results.
	 */
	public ?int $total;

	/**
	 * @var array An array of batches matching the search.
	 */
	public array $data = [];

	/**
	 * @var int|null The number of batches skipped from the results.
	 */
	public ?int $offset;

	/**
	 * @var int|null The maximum amount of batches that will be included.
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
				$this->data[$key] = new BatchListItem($value);
			}
		}
	}

	public function getType(): string {
		return $this->type;
	}
}