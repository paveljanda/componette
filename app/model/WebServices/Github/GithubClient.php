<?php

namespace App\Model\WebServices\Github;

use App\Model\Exceptions\Runtime\WebServices\GithubException;
use Contributte\Http\Curl\CurlClient;
use Contributte\Http\Curl\Response;

final class GithubClient
{

	const VERSION = 'v3';
	const URL_API = 'https://api.github.com';
	const URL_AVATAR = 'https://avatars.githubusercontent.com';
	const URL_CONTENT = 'https://raw.githubusercontent.com';

	/** @var CurlClient */
	private $curl;

	/** @var string */
	private $token;

	/**
	 * @param CurlClient $curl
	 * @param string $token
	 */
	public function __construct(CurlClient $curl, $token)
	{
		$this->curl = $curl;
		$this->token = $token;
	}

	/**
	 * @param string $uri
	 * @return string
	 */
	public function getApiUrl(string $uri): string
	{
		return self::URL_API . '/' . trim($uri, '/');
	}

	/**
	 * @param string $username
	 * @return string
	 */
	public function getAvatarUrl(string $username): string
	{
		return self::URL_AVATAR . '/' . trim($username, '/');
	}

	/**
	 * @param string $uri
	 * @return string
	 */
	public function getContentUrl(string $uri): string
	{
		return self::URL_CONTENT . '/' . trim($uri, '/');
	}

	/**
	 * @param string $url
	 * @param array $headers
	 * @param array $opts
	 * @return Response
	 */
	public function makeRequest($url, array $headers = [], array $opts = [])
	{
		if ($this->token) {
			$headers['Authorization'] = 'token ' . $this->token;
		}

		$response = $this->curl->makeRequest($url, $headers, $opts);

		if ($response->getStatusCode() > 400) {
			throw new GithubException($response);
		}

		return $response;
	}

}
