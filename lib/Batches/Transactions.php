<?php

declare(strict_types=1);

namespace USAePay\Batches;

use \USAePay\API;
use \USAePay\Exception\SDKException;
use USAePay\Interface\ResponseInterface;

class Transactions
{
	/**
	 * @throws SDKException
	 */
	public static function get(
		string $batchKey,
		?int   $limit = null,
		?int   $offset = null,
		?bool  $returnBin = null
	): ResponseInterface {
		$Path = "/batches/$batchKey/transactions";
		$Params = [
			'batch_key' => $batchKey,
		];

		if ($limit) {
			$Params['limit'] = $limit;
		}
		if ($offset) {
			$Params['offset'] = $offset;
		}
		if ($returnBin) {
			$Params['return_bin'] = $returnBin;
		}

		try {
			return API::runCall('get', $Path, $Params, $Params);
		} catch (SDKException $e) {
			throw $e;
		} catch (\Exception $e) {
			throw new SDKException("Unexpected exception thrown");
		}
	}
}
