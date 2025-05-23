<?php

declare(strict_types=1);

namespace USAePay\Dto\Response;

use USAePay\Dto\AbstractList;
use USAePay\Dto\Batches\BatchListItem;

class BatchesList extends AbstractList
{
	public function getDataClassName(): string {
		return BatchListItem::class;
	}
}