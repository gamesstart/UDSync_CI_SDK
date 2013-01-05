<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * UDSync SDK for CodeIgniter
 *
 * This SDK is design for access UDSync API
 * Please make sure this Application is registered
 * Curl is faster than "file_get_contents"
 *
 * @package		CodeIgniter
 * @subpackage	UDSync_CI_SDK
 * @author 		a20968
 * @category	Libraries
 * @link 		https://github.com/a20968/UDSync_CI_SDK
*/

class Udsync
{
	protected $APP_ID = '' ; //Here's your APP_ID
	protected $APP_KEY = '' ; //Your APP_KEY
	protected $UDSync_Server = 'http://yourserver/index.php/api/' ; //HTTP Link to your UDSync application(Add /index.php/api)

	protected static function curl_get_content( $url )
	{
		$ch = curl_init();   
		curl_setopt($ch, CURLOPT_URL, $url); //Set access url adress
		curl_setopt($ch, CURLOPT_TIMEOUT, 5); //Set timeout
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Ser return value
		$r = curl_exec($ch); //Set $r
		curl_close($ch); //Close curl function
		return $r; //Return data
	}

	public function user_create ( $id , $email , $password )
	{
		$json = json_decode(self::curl_get_content( $this->UDSync_Server .'user/user_create/'.$id.'/'.urlencode($email).'/'.$password.'/'.$this->APP_ID.'/'.$this->APP_KEY ));
		if ( $json->status == 0 )
		{
			return 1;
		} else {
			return 0;
		}
	}

	public function user_login ( $id , $password , $ip , $ua )
	{
		$json = json_decode(self::curl_get_content( $this->UDSync_Server .'user/user_login/'.$id.'/'.$password.'/'.$ip.'/'.$ua.'/'.$this->APP_ID.'/'.$this->APP_KEY ));
		if ( $json->status == 0 )
		{
			return 1;
		} else {
			return 0;
		}
	}

	public function user_logout ( $id )
	{
		$json = json_decode(self::curl_get_content( $this->UDSync_Server .'user/user_logout/'.$id.'/'.$this->APP_ID.'/'.$this->APP_KEY ));
		if ( $json->status == 0 )
		{
			return 1;
		} else {
			return 0;
		}
	}

	public function session_match ( $hash ) //$this->udsync->session_match( sha1(md5($this->input->ip_address()).md5($this->input->user_agent())) );
	{
		$json = json_decode(self::curl_get_content( $this->UDSync_Server .'/session/session_match/'.$hash.'/'.$this->APP_ID.'/'.$this->APP_KEY ));
		if ( $json->status == 0 )
		{
			return $json->message;
		} else {
			return null;
		}
	}
}