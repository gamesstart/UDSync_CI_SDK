<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * UDSync SDK example Register
 *
 * This example is using "user_create" function
 * Please make sure your APP_ID and APP_KEY is correct
 *
 * @package		CodeIgniter
 * @subpackage	UDSync_CI_SDK
 * @author 		a20968
 * @category	Controller
 * @link 		https://github.com/a20968/UDSync_CI_SDK
*/

class Register extends CI_Controller
{
	function index()
	{
		$this->load->helper('form');
		$this->load->view('register_form');
	}

	function post_register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
  		$this->form_validation->set_rules('password', 'Password', 'required');
  		if ($this->form_validation->run() == FALSE)
  		{
  			$this->load->helper('form');
  			$this->load->view('register_form');
  		} else {
  			if ( $this->udsync->user_create( $this->input->post('username',TRUE) , $this->input->post('email',TRUE) , $this->input->post('password',TRUE) , md5($this->input->ip_address()) , md5($this->input->user_agent())) == 1 )
  			{
  				echo 'Register Success! <a href="/index.php/example/login">Get to Login</a>.';
  			} else {
  				echo 'Register Faild! <a href="/index.php/example/register">Try again?</a>';
  			}
  		}
	}
}