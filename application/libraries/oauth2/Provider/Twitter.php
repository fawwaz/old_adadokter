<?php
/**
 * Facebook OAuth2 Provider
 *
 * @package    CodeIgniter/OAuth2
 * @category   Provider
 * @author     Phil Sturgeon
 * @copyright  (c) 2012 HappyNinjas Ltd
 * @license    http://philsturgeon.co.uk/code/dbad-license
 */

class OAuth2_Provider_Twitter extends OAuth2_Provider
{
	protected $scope = array('offline_access', 'email', 'read_stream');

	public function url_authorize()
	{
		return 'https://api.twitter.com/oauth/authorize';
	}

	public function url_access_token()
	{
		return 'https://api.twitter.com/oauth/access_token';
	}

	public function requestTokenURL() { 
		return 'https://api.twitter.com/oauth/request_token'; 
	}

	public function get_user_info(OAuth2_Token_Access $token)
	{
		$url = 'https://api.twitter.com/1.1/account/verify_credentials.json'.http_build_query(array(
			'access_token' => $token->access_token,
		));

		$user = json_decode(file_get_contents($url));

		// Create a response from the request
		return array(
			'uid' => $user->id,
			'nickname' => isset($user->username) ? $user->username : null,
			'name' => $user->name,
			'first_name' => isset($user->first_name) ? $user->first_name : null,
			'last_name' => isset($user->last_name) ? $user->last_name : null,
			'email' => isset($user->email) ? $user->email : null,
			'location' => isset($user->location) ? $user->location : null,
			'description' => isset($user->description) ? $user->description : null,
			'image' => $user->profile_image_url
		);
	}


	public function authorize($options = array()){

	}

	public function getRequestToken(){
		$oauth_version =  '1.0';
		$nonce = md5(microtime() . mt_rand());
		$timestamp = time();
		$consumerkey = 
		$oauth_token =
		
	}
}
