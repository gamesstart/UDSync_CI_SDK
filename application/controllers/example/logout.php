<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * UDSync SDK example logout
 *
 * This example is using "user_logout" function
 * Please make sure your APP_ID and APP_KEY is correct
 *
 * @package		CodeIgniter
 * @subpackage	UDSync_CI_SDK
 * @author 		a20968
 * @category	Controller
 * @link 		https://github.com/a20968/UDSync_CI_SDK
*/

class Logout extends CI_Controller
{
	function index()
	{
		$user = $this->udsync->session_match( sha1(md5($this->input->ip_address()).md5($this->input->user_agent())) );
		if( $user == null )
		{
			echo 'No login with any account. <a href="/index.php">Get back to index</a>.';
			exit;
		} else {
			$this->udsync->user_logout($user);
			echo 'Logout success. <a href="/index.php">Get back to index</a>.';
			exit;
		}
	}
}