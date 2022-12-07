<?php

namespace JiraConnect\Atlassian;


use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use JiraConnect\Plugin;
use Psr\Http\Message\ResponseInterface;

class OAuthWrapper {
	protected $baseUrl;
	protected $sandbox;
	protected $consumerKey;
	protected $consumerSecret;
	protected $callbackUrl;
	protected $requestTokenUrl = 'oauth';
	protected $accessTokenUrl = 'oauth';
	protected $authorizationUrl = 'OAuth.action?oauth_token=%s';

	protected $tokens;

	protected $client;

	public function __construct($baseUrl) {
		$this->baseUrl = $baseUrl;
	}

	/**
	 * @return array
	 * @throws Exception
	 * @author Piotr Karecki <pkarecki@gmail.com>
	 */
	public function requestTempCredentials() {
		return $this->requestCredentials(
			$this->requestTokenUrl . '?oauth_callback=' . $this->callbackUrl
		);
	}

	/**
	 * @param $token
	 * @param $tokenSecret
	 * @param $verifier
	 *
	 * @return array
	 * @throws Exception
	 * @author Piotr Karecki <pkarecki@gmail.com>
	 */
	public function requestAuthCredentials($token, $tokenSecret, $verifier) {
		return $this->requestCredentials(
			$this->accessTokenUrl . '?oauth_callback=' . $this->callbackUrl . '&oauth_verifier=' . $verifier,
			$token,
			$tokenSecret
		);
	}

	/**
	 * @param $url
	 * @param bool $token
	 * @param bool $tokenSecret
	 *
	 * @return array
	 * @throws Exception
	 * @author Piotr Karecki <pkarecki@gmail.com>
	 */
	protected function requestCredentials($url, $token = false, $tokenSecret = false) {
		$client = $this->getClient($token, $tokenSecret);

		$response = $client->post($url, [
			'auth' => 'oauth'
		]);

		return $this->makeTokens($response);
	}

	/**
	 * @param ResponseInterface $response
	 *
	 * @return array
	 * @throws Exception
	 * @author Piotr Karecki <pkarecki@gmail.com>
	 */
	protected function makeTokens($response) {
		$body = (string) $response->getBody();

		$tokens = array();
		parse_str($body, $tokens);

		if (empty($tokens)) {
			throw new Exception("An error occurred while requesting oauth token credentials");
		}

		$this->tokens = $tokens;
		return $this->tokens;
	}

	public function getClient($token = false, $tokenSecret = false) {
		if (!is_null($this->client)) {
			return $this->client;
		} else {
			$temp_file = dirname(Plugin::getPluginEntryFile()).'/config/jira.key';
			$middleware = new Oauth1([
				'token'           => $token ? $token : null,
				'token_secret'    => $tokenSecret ? $tokenSecret : null,
				'consumer_key'    => $this->consumerKey,
				'consumer_secret' => $this->consumerSecret,
				'private_key_file' => $temp_file,
				'private_key_passphrase' => null,
				'signature_method' => Oauth1::SIGNATURE_METHOD_RSA,
			]);

			$stack = HandlerStack::create();
			$stack->push($middleware);

			$this->client = new Client([
				'base_uri' => $this->baseUrl,
				'handler' => $stack
			]);

			return $this->client;
		}
	}

	public function makeAuthUrl() {
		return $this->baseUrl . sprintf($this->authorizationUrl, urlencode($this->tokens['oauth_token']));
	}

	public function setConsumerKey($consumerKey) {
		$this->consumerKey = $consumerKey;
		return $this;
	}

	public function setConsumerSecret($consumerSecret) {
		$this->consumerSecret = $consumerSecret;
		return $this;
	}

	public function setCallbackUrl($callbackUrl) {
		$this->callbackUrl = $callbackUrl;
		return $this;
	}

	public function setRequestTokenUrl($requestTokenUrl) {
		$this->requestTokenUrl = $requestTokenUrl;
		return $this;
	}

	public function setAccessTokenUrl($accessTokenUrl) {
		$this->accessTokenUrl = $accessTokenUrl;
		return $this;
	}

	public function setAuthorizationUrl($authorizationUrl) {
		$this->authorizationUrl = $authorizationUrl;
		return $this;
	}
}