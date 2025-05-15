<?php

declare(strict_types=1);

namespace USAePay;

use Exception;
use USAePay\Exception\CurlException;
use USAePay\Exception\SDKException;
use USAePay\Exception\ueException;

class API
{
	public static int $timeout = 45;

	public static string $endpoint_key = 'v2';

	public static bool $local_test = false;

	public static string $subdomain = 'secure';

	public static bool $high_availability = false;

	public static array $available_subdomains = [
		'www-01',
		'www-02',
		'www-03',
		'www-04',
	];

	public static string|null $password = null;
	private static string|null $proxy = null;

	public static function setAuthentication(string $api_key, string $api_pin): void {
		/// Configure authorization:
		$seed = substr(hash('sha256', (string)mt_rand()), 10, 25);
		$clear = $api_key . $seed . $api_pin;
		$hash = "s2/" . $seed . "/" . hash('sha256', $clear);
		self::$password = "$api_key:$hash";
	}

	public static function testLocally(bool $local = true): void {
		self::$local_test = $local;
	}

	/**
	 * @throws SDKException
	 */
	public static function setTimeOut(int $timeout_value): void {
		if ($timeout_value > 60 || $timeout_value < 1) {
			throw new SDKException("Invalid timeout value, please pick a value between 0-60.");
		}
		self::$timeout = $timeout_value;
	}

	public static function setEndpointKey(string $endpoint_key_value): void {
		self::$endpoint_key = $endpoint_key_value;
	}

	public static function setSubdomain(string $subdomain_value): void {
		self::$subdomain = $subdomain_value;
	}

	/**
	 * @throws CurlException
	 * @throws SDKException
	 */
	public static function ping(string $subdomain = 'all'): array {
		switch ($subdomain) {
			case 'all':
				$subdomains = [
					'www-01',
					'www-02',
					'www-03',
					'www-04',
				];
				$mh = curl_multi_init();

				foreach ($subdomains as $subdomainInLoop) {
					$url = 'https://' . $subdomainInLoop . '.usaepay.com/ping';
					$curl_handles[$subdomainInLoop] = [
						'handle' => curl_init($url),
						'subdomain' => $subdomainInLoop,
					];
					curl_setopt($curl_handles[$subdomainInLoop]['handle'], CURLOPT_URL, $url);
					curl_setopt($curl_handles[$subdomainInLoop]['handle'], CURLOPT_RETURNTRANSFER, true);
					curl_multi_add_handle($mh, $curl_handles[$subdomainInLoop]['handle']);
				}

				do {
					$status = curl_multi_exec($mh, $active);
					if ($active) {
						curl_multi_select($mh);
					}
				} while ($active && $status == CURLM_OK);
				$up_subdomains = [];
				foreach ($curl_handles as $handle) {
					$extra_info = curl_getinfo($handle['handle']);
					$response = curl_multi_getcontent($handle['handle']);
					if (str_starts_with($response, 'UP')) {
						$up_subdomains[] = $handle['subdomain'];
					}
					$return_data[] = [
						'subdomain' => $handle['subdomain'],
						'status' => (str_starts_with($response, 'UP') ? 'UP' : 'DOWN'),
						'total_call_time' => $extra_info['total_time'],
					];
				}
				self::$available_subdomains = $up_subdomains;

				return $return_data;
			case 'sandbox':
			case 'secure':
			case 'www':
			case 'www-01':
			case 'www-02':
			case 'www-03':
			case 'www-04':
				$baseURL = 'https://' . $subdomain . '.usaepay.com/ping';
				$curl = curl_init($baseURL);
				curl_setopt($curl, CURLOPT_URL, $baseURL);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$curl_response = curl_exec($curl);
				if (!$curl_response) {
					throw new CurlException(curl_error($curl));
				}
				$extra_info = curl_getinfo($curl);
				curl_close($curl);

				return [
					'subdomain' => $subdomain,
					'status' => (str_starts_with($curl_response, 'UP') ? 'UP' : 'DOWN'),
					'total_call_time' => $extra_info['total_time'],
				];
			default:
				throw new SDKException("Subdomain Not Found, Please check our high availability documentation.");
		}
	}

	/**
	 * @throws SDKException
	 */
	public static function runCall(
		string     $type,
		string     $path,
		array|null $data = null,
		array|null $params = null,
		string     $return_type = 'json'
	) {
		if (!self::$password) {
			throw new SDKException("Please set api key and pin with setAuthentication before attempting other calls.");
		}
		if ($data) {
			$curl_post_data = json_encode($data);
		}
		else {
			$curl_post_data = '[]';
		}
		$first = true;
		if ($params && count($params) > 0) {
			foreach ($params as $name => $value) {
				$path .= ($first ? '?' : '&') . $name . '=' . $value;
				$first = false;
			}
		}
		if (self::$high_availability) {
			throw new SDKException("Feature not yet available.");
		}

		$service_url = "https://" . self::$subdomain . ".usaepay.com/api/" . self::$endpoint_key . $path;
		$headers = ['Content-type: application/json'];
		$curl = curl_init($service_url);
		curl_setopt($curl, CURLOPT_URL, $service_url);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_USERPWD, self::$password);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_TIMEOUT, self::$timeout);

		if (self::$proxy) {
			curl_setopt($curl, CURLOPT_PROXY, self::$proxy);
		}

		switch ($type) {
			case 'post':
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
				break;

			case 'get':
				curl_setopt($curl, CURLOPT_POST, false);
				break;

			case 'delete':
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
				curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
				break;

			case 'put':
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
				curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
				break;

			default:
				throw new SDKException("Unexpected Call Type");
		}
		try {
			if (self::$local_test) {
				$curl_response = \USAePay\MockHandler::mockCall($type, $service_url, $curl_post_data);
			}
			else {
				$curl_response = curl_exec($curl);
				if (!$curl_response) {
					throw new CurlException(curl_error($curl));
				}
			}
			switch ($return_type) {
				case 'string':
				case 'json':
					$response = json_decode($curl_response);
					if (is_object($response)) {
						if (property_exists($response, "error")
							&& (!property_exists($response, "result")
								|| $response->result === "error")) {
							throw new ueException($response->error, $response->errorcode);
						}
					}
					break;
				case 'base64':
					$response = base64_decode($curl_response);
					break;
				default:
					throw new SDKException("Unexpected Return Type");
			}

			return $response;
		} catch (Exception $e) {
			return curl_error($curl);
		}
	}

	public static function setProxy(?string $proxy): void {
		self::$proxy = $proxy;
	}
}
