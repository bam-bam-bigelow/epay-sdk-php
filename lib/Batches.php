<?php

declare(strict_types=1);

namespace USAePay;

use \USAePay\Exception\SDKException;
use USAePay\Interface\ResponseInterface;

class Batches
{
	public static function get(array $Data = []): ResponseInterface {
		$Path = "/batches";
		$Params = [];

		if (array_key_exists('limit', $Data)) {
			$Params['limit'] = $Data['limit'];
		}
		if (array_key_exists('offset', $Data)) {
			$Params['offset'] = $Data['offset'];
		}
		if (array_key_exists('openedlt', $Data)) {
			$Params['openedlt'] = $Data['openedlt'];
		}
		if (array_key_exists('openedgt', $Data)) {
			$Params['openedgt'] = $Data['openedgt'];
		}
		if (array_key_exists('closedlt', $Data)) {
			$Params['closedlt'] = $Data['closedlt'];
		}
		if (array_key_exists('closedgt', $Data)) {
			$Params['closedgt'] = $Data['closedgt'];
		}
		if (array_key_exists('openedle', $Data)) {
			$Params['openedle'] = $Data['openedle'];
		}
		if (array_key_exists('openedge', $Data)) {
			$Params['openedge'] = $Data['openedge'];
		}
		if (array_key_exists('closedle', $Data)) {
			$Params['closedle'] = $Data['closedle'];
		}
		if (array_key_exists('closedge', $Data)) {
			$Params['closedge'] = $Data['closedge'];
		}

		if (array_key_exists("batch_key", $Data)) {
			$Path .= '/' . $Data["batch_key"];
			unset($Data["batch_key"]);
		}

		try {
			$response = API::runCall('get', $Path, $Data, $Params);
			if (!is_object($response)) {
				throw new SDKException("Unexpected response type 55: " . gettype($response));
			}

			return $response;
		} catch (SDKException $e) {
			throw $e;
		} catch (\Exception $e) {
			throw new SDKException("Unexpected exception thrown");
		}
	}

	public static function getByKey(string $batchKey): ResponseInterface {
		$Path = "/batches/" . $batchKey;
		try {
			$response = API::runCall('get', $Path, [], []);
			if (!is_object($response)) {
				throw new SDKException("Unexpected response type 55: " . gettype($response));
			}

			return $response;
		} catch (SDKException $e) {
			throw $e;
		} catch (\Exception $e) {
			throw new SDKException("Unexpected exception thrown");
		}
	}
}
