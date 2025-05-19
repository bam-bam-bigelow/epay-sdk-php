<?php

declare(strict_types=1);

namespace USAePay\Interface;

interface ResponseInterface
{
	public const TYPE_ERROR = 'error';

	public function getType(): string;
}