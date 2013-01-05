<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * UDSync SDK example login
 *
 * This example is using "user_login" function
 * Please make sure your APP_ID and APP_KEY is correct
 *
 * @package		CodeIgniter
 * @subpackage	UDSync_CI_SDK
 * @author 		a20968
 * @category	Controller
 * @link 		https://github.com/a20968/UDSync_CI_SDK
*/

class Login extends CI_Controller
{
	function index()
	{
		$this->load->helper('form');
		$this->load->view('login_form');
	}

	function post_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
  		$this->form_validation->set_rules('password', 'Password', 'required');
  		if ($this->form_validation->run() == FALSE)
  		{
  			$this->load->helper('form');
  			$this->load->view('login_form');
  		} else {
  			if ( $this->udsync->user_login( $this->input->post('username',TRUE) , $this->input->post('password',TRUE) , md5($this->input->ip_address()) , md5($this->input->user_agent())) == 1 )
  			{
  				echo 'Login Success! <a href="/index.php">Get back to index</a>.';
  			} else {
  				echo 'Login Faild! <a href="/index.php/example/login">Try again?</a>';
  			}
  		}
	}
}