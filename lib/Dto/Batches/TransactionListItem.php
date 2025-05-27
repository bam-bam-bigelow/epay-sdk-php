<?php

declare(strict_types=1);

namespace USAePay\Dto\Batches;

use USAePay\Interface\ResponseInterface;

class TransactionListItem implements ResponseInterface
{
	public const STATUS_SETTLED = 'Settled';

	// https://help.usaepay.info/developer/reference/transactioncodes/#transaction-type-codes
	private const TRANSACTION_TYPES = [
		'S' => 'Sale',
		'A' => 'Auth',
		'C' => 'Refund',
		'V' => 'Void',
		'L' => 'Capture',
		'Z' => 'VoidedRefund',
		'_' => 'Verify',
		'D' => 'Sale',
		'N' => 'Refund',
		'W' => 'Void',
	];

	private string $type;
	private string $key;
	private string $refnum;
	private \DateTime $created;
	private string $trantype_code;
	private string $trantype;
	private string $result_code;
	private string $result;
	private string $authcode;
	private string $status_code;
	private string $status;
	private array $creditcard;
	private array $avs;
	private array $batch;
	private float $amount;
	private array $amount_detail;
	private string $invoice;
	private string $orderid;
	private string $description;
	private string $customer_email;
	private string $merchant_email;
	private string $source_name;
	private array $billing_address;
	private array $shipping_address;
	private array $platform;
	private array $available_actions;
	private array $rawData;

	public function __construct(array $data) {
		$this->type = $data['type'] ?? '';
		$this->key = $data['key'] ?? '';
		$this->refnum = $data['refnum'] ?? '';
		$this->created = new \DateTime($data['created'] ?? '');
		$this->trantype_code = $data['trantype_code'] ?? '';
		$this->trantype = $data['trantype'] ?? '';
		$this->result_code = $data['result_code'] ?? '';
		$this->result = $data['result'] ?? '';
		$this->authcode = $data['authcode'] ?? '';
		$this->status_code = $data['status_code'] ?? '';
		$this->status = $data['status'] ?? '';
		$this->creditcard = $data['creditcard'] ?? [];
		$this->avs = $data['avs'] ?? [];
		$this->batch = $data['batch'] ?? [];
		$this->amount = (float)($data['amount'] ?? 0.00);
		$this->amount_detail = $data['amount_detail'] ?? [];
		$this->invoice = $data['invoice'] ?? '';
		$this->orderid = $data['orderid'] ?? '';
		$this->description = $data['description'] ?? '';
		$this->customer_email = $data['customer_email'] ?? '';
		$this->merchant_email = $data['merchant_email'] ?? '';
		$this->source_name = $data['source_name'] ?? '';
		$this->billing_address = $data['billing_address'] ?? [];
		$this->shipping_address = $data['shipping_address'] ?? [];
		$this->platform = $data['platform'] ?? [];
		$this->available_actions = $data['available_actions'] ?? [];

		$this->rawData = $data;
	}

	public function getType(): string {
		return $this->type;
	}

	public function getKey(): string {
		return $this->key;
	}

	public function getRefnum(): string {
		return $this->refnum;
	}

	public function getCreated(): \DateTime {
		return $this->created;
	}

	public function getTrantypeCode(): string {
		return $this->trantype_code;
	}

	public function getTrantype(): string {
		return $this->trantype;
	}

	public function getResultCode(): string {
		return $this->result_code;
	}

	public function getResult(): string {
		return $this->result;
	}

	public function getAuthcode(): string {
		return $this->authcode;
	}

	public function getStatusCode(): string {
		return $this->status_code;
	}

	public function getStatus(): string {
		return $this->status;
	}

	public function getCreditcard(): array {
		return $this->creditcard;
	}

	public function getAvs(): array {
		return $this->avs;
	}

	public function getBatch(): array {
		return $this->batch;
	}

	public function getAmount(): float {
		return $this->amount;
	}

	public function getAmountDetail(): array {
		return $this->amount_detail;
	}

	public function getInvoice(): string {
		return $this->invoice;
	}

	public function getOrderid(): string {
		return $this->orderid;
	}

	public function getDescription(): string {
		return $this->description;
	}

	public function getCustomerEmail(): string {
		return $this->customer_email;
	}

	public function getMerchantEmail(): string {
		return $this->merchant_email;
	}

	public function getSourceName(): string {
		return $this->source_name;
	}

	public function getBillingAddress(): array {
		return $this->billing_address;
	}

	public function getShippingAddress(): array {
		return $this->shipping_address;
	}

	public function getPlatform(): array {
		return $this->platform;
	}

	public function getAvailableActions(): array {
		return $this->available_actions;
	}

	public function getCardNumber(): string {
		return $this->creditcard['number'] ?? '';
	}

	public function getState(): string {
		return $this->billing_address['state'] ?? '';
	}

	public function getRawData(): array {
		return $this->rawData;
	}

	public function getTransactionTypeLabel(): string {
		return self::TRANSACTION_TYPES[$this->trantype_code] ?? 'Unknown';
	}
}