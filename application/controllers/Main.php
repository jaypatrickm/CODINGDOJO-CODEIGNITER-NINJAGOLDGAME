<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->output->enable_profiler();
	}

	public function index()
	{
		redirect('Start');
	}

	public function start_game()
	{
		$gold = $this->session->set_userdata('gold', 0);
		$log = $this->session->set_userdata('log', '<li>A wild ninja appears...</li>');
		$this->load->view('index');
	}

	public function process_money()
	{
		if($this->input->post('unset') == "unset")
		{ 
			$this->session->sess_destroy();
			redirect('Start');
		}
		$this->load->helper('date');
		$datestring = '%F %j%S %Y %g:%i%a';
		$time = now('America/Los_Angeles');
		if($this->input->post('farm') == "farm")
		{ 
			$this->session->set_userdata('earned' , rand(10,20));
			$this->session->set_userdata('gold', $this->session->userdata('gold') + $this->session->userdata('earned'));
			$this->session->set_userdata('action', '<li>You entered a farm and earned ' . $this->session->userdata('earned') . ' gold(s). (' . mdate($datestring, $time) . ')</li>');
		}
		if($this->input->post('cave') == "cave")
		{ 
			$this->session->set_userdata('earned' , rand(5,10));
			$this->session->set_userdata('gold', $this->session->userdata('gold') + $this->session->userdata('earned'));
			$this->session->set_userdata('action', '<li>You entered a cave and earned ' . $this->session->userdata('earned') . ' gold(s). (' . mdate($datestring, $time) . ')</li>');
		}
		if($this->input->post('house') == "house")
		{ 
			$this->session->set_userdata('earned' , rand(2,5));
			$this->session->set_userdata('gold', $this->session->userdata('gold') + $this->session->userdata('earned'));
			$this->session->set_userdata('action', '<li>You entered a house and earned ' . $this->session->userdata('earned') . ' gold(s). (' . mdate($datestring, $time) . ')</li>');
		}
		if($this->input->post('casino') == 'casino')
		{
			$this->session->set_userdata('earned' , rand(-50,50));
			$this->session->set_userdata('gold', $this->session->userdata('gold') + $this->session->userdata('earned'));
			if($this->session->userdata('earned') < 0){
				$this->session->set_userdata('action', '<li class="red">You entered a casino and lossed ' . $this->session->userdata('earned') . ' gold(s). (' . mdate($datestring, $time) . ')</li>');
			} else
			{
				$this->session->set_userdata('action', '<li>You entered a casino and earned ' . $this->session->userdata('earned') . ' gold(s). (' . mdate($datestring, $time) . ')</li>');
			}
		}
		$this->session->set_userdata('log', $this->session->userdata('action') . $this->session->userdata('log'));
		$this->load->view('index');
	}
}

//end of main controller