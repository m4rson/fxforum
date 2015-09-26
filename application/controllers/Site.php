<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$data['yield'] = 'site/home';
		$data['title'] = 'Home';
    $this->load->view('layouts/application', $data);
	}

	public function display()
	{
		$conf = [
			'start_day' => 'monday',
			'day_type' => 'long',
			'show_next_prev' => true,
			'next_prev_url' => base_url() . 'site/display'
		];
		$this->load->library('calendar', $conf);
		$data['yield'] = 'site/calendar';
		$data['calendar'] = $this->calendar->generate();
		$this->load->view('layouts/application', $data);
	}
}
