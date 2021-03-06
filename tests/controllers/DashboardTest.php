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
		$this->CI->session->set_userdata('user_id','1');
		$this->CI->session->set_userdata('username','admin');
	}
	
	public function testIndex()
	{
		// Call the controllers method
		$this->CI->index();
		
		// Fetch the buffered output
		$out = output();
		
		// Check if the content is OK
		$this->assertSame(0, preg_match('/(error|notice)/i', $out));
	}
	
	public function testProfile()
	{
		// Call the controllers method
		$this->CI->profile();
		
		// Fetch the buffered output
		$out = output();
				
		// Check if the content is OK
		$this->assertSame(0, preg_match('/(error|notice)/i', $out));
	}
}
