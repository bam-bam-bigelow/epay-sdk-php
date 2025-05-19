<?php

declare(strict_types=1);

namespace USAePay\Dto\Response;

use USAePay\Interface\ResponseInterface;

class Error implements ResponseInterface
{
	private readonly string|null $errorMessage;

	public function __construct(string $errorMessage = null) {
		{
			$this->errorMessage = $errorMessage;
		}
	}

	public function getType(): string {
		return ResponseInterface::TYPE_ERROR;
	}

	public function getErrorMessage(): string {
		return $this->errorMessage;
	}
}