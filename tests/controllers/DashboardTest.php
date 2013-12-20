<?php

/**
 * @group Controller
 */

class DashboardTest extends CIUnit_TestCase
{
	public function setUp()
	{
		// Set the tested controller
		$this->CI = set_controller('dashboard');
	}
	
	public function testIndex()
	{
		$this->CI->session->set_userdata('user_id','1');
		$this->CI->session->set_userdata('username','admin');
		
		// Call the controllers method
		$this->CI->index();
		
		// Fetch the buffered output
		$out = output();
		
		// Check if the content is OK
		$this->assertSame(0, preg_match('/(error|notice)/i', $out));
	}
}
