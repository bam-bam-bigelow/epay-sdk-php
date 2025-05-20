<?php

declare(strict_types=1);

namespace USAePay\Dto\Response;

use USAePay\Dto\AbstractList;
use USAePay\Dto\Batches\TransactionListItem;

class TransactionsList extends AbstractList
{
	public function getDataClassName(): string {
		return TransactionListItem::class;
	}
}