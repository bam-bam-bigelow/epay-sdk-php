<?php

declare(strict_types=1);

namespace USAePay\Dto\Batches;

use USAePay\Interface\ResponseInterface;

class BatchListItem implements ResponseInterface
{
	private const TYPE_BATCH = 'batch';
	public float $total_amount;
	public int $total_count;
	public float $refunds_amount;
	public int $refunds_count;
	public ?string $status = null;

	/**
	 * This is the unique batch identifier.
	 */
	private readonly string $key;

	/**
	 * Type of object. Will always be batch for this endpoint.
	 */
	private readonly string $type;

	/**
	 * This is the unique batch identifier. This was originally used in the SOAP API.
	 */
	private readonly string $batchRefNum;

	/**
	 * @var int Batch sequence number
	 */
	private readonly int $sequence;
	private readonly ?int $parentSequence;

	/**
	 * @var string Date and time the batch was opened. Format will be, YYYY-MM-DD HH:MM:SS.
	 */
	private readonly string $opened;

	/**
	 * @var string Date and time the batch was closed. Format will be, YYYY-MM-DD HH:MM:SS.
	 */
	private readonly string $closed;
	private readonly ?string $resubmitted;
	private readonly bool $locked;
	private readonly string $lockDate;
	private readonly ?string $tranCutoff;
	private readonly int $salesCount;
	private readonly float $sales;
	private readonly int $creditsCount;
	private readonly float $credits;

	public function __construct(array $data = []) {
		if ($data['type'] !== self::TYPE_BATCH) {
			throw new \InvalidArgumentException('Invalid type, expected "batch", got "' . $data['type'] . '"');
		}
		$this->type = self::TYPE_BATCH;

		$this->key = (string)($data['key'] ?? '');
		$this->batchRefNum = (string)($data['batchrefnum'] ?? '');
		$this->sequence = (int)($data['sequence'] ?? 0);
		$this->parentSequence = isset($data['parent_sequence']) ? (int)$data['parent_sequence'] : null;
		$this->opened = (string)($data['opened'] ?? '');
		$this->closed = (string)($data['closed'] ?? '');
		$this->resubmitted = $data['resubmitted'] ?? null;
		$this->locked = (bool)($data['locked'] ?? false);
		$this->lockDate = (string)($data['lockdate'] ?? '');
		$this->tranCutoff = $data['trancutoff'] ?? null;
		$this->salesCount = (int)($data['sales_count'] ?? 0);
		$this->sales = (float)($data['sales'] ?? 0.0);
		$this->creditsCount = (int)($data['credits_count'] ?? 0);
		$this->credits = (float)($data['credits'] ?? 0.0);
		$this->total_amount = (float)($data['total_amount'] ?? 0.0);
		$this->total_count = (int)($data['total_count'] ?? 0);
		$this->refunds_amount = (float)($data['refunds_amount'] ?? 0.0);
		$this->refunds_count = (int)($data['refunds_count'] ?? 0);
		$this->status = $data['status'] ?? null;
	}

	public function getKey(): string {
		return $this->key;
	}

	public function getType(): string {
		return $this->type;
	}

	public function getBatchRefNum(): string {
		return $this->batchRefNum;
	}

	public function getSequence(): int {
		return $this->sequence;
	}

	public function getParentSequence(): ?int {
		return $this->parentSequence;
	}

	public function getOpened(): string {
		return $this->opened;
	}

	public function getClosed(): string {
		return $this->closed;
	}

	public function getResubmitted(): ?string {
		return $this->resubmitted;
	}

	public function isLocked(): bool {
		return $this->locked;
	}

	public function getLockDate(): string {
		return $this->lockDate;
	}

	public function getTranCutoff(): ?string {
		return $this->tranCutoff;
	}

	public function getSalesCount(): int {
		return $this->salesCount;
	}

	public function getSales(): float {
		return $this->sales;
	}

	/**
	 * @Deprecated
	 */
	public function getCreditsCount(): int {
		return $this->creditsCount;
	}

	/**
	 * @Deprecated
	 */
	public function getCredits(): float {
		return $this->credits;
	}
}