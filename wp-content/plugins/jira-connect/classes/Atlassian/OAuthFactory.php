<?php


namespace JiraConnect\Atlassian;


use JiraConnect\Options\Framework;

class OAuthFactory {
	private $baseUrl;
	private $consumerKey;
	private $consumerSecret;
	private $callbackUrl;
	private $oauth;
	private $framework;

	public function __construct(Framework $framework) {
		$this->framework = $framework;
	}

	public function client_factory() {
		$oauth = $this->oauth_factory();
		$token = get_option('sollers_jira_token', false);
		$tokenSecret = get_option('sollers_jira_token_secret', false);
		return $oauth->getClient($token, $tokenSecret);
	}

	public function oauth_factory() {
		if (!empty($this->oauth)) {
			return $this->oauth;
		}
		$framework = $this->framework;
		// Get options
		$this->baseUrl = $framework->get('jira_baseUrl', 'https://jirauat.sollers.eu/');
		$this->consumerKey = $framework->get('jira_consumerKey', 'OauthKey');
		$this->consumerSecret = $framework->get('jira_consumerSecret', '');
		$this->callbackUrl = get_option('sollers_jira_callback');

		$this->oauth = new OAuthWrapper($this->baseUrl);
		$this->oauth->setConsumerKey($this->consumerKey)
		            ->setConsumerSecret($this->consumerSecret)
		            ->setRequestTokenUrl('plugins/servlet/oauth/request-token')
		            ->setAuthorizationUrl('plugins/servlet/oauth/authorize?oauth_token=%s')
		            ->setAccessTokenUrl('plugins/servlet/oauth/access-token')
		            ->setCallbackUrl($this->callbackUrl);
		return $this->oauth;
	}
}