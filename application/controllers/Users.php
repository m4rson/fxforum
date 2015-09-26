<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

	public function index()
	{

	}

  public function create()
	{
    $data['yield'] = 'users/create';
		$data['title'] = 'Register';
    $this->load->view('layouts/application', $data);
  }

  public function register()
	{
    //validate user input
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[35]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]');
    //if user input is incorrect
    if($this->form_validation->run() === false)
    {
      $data['yield'] = 'users/create';
      $this->load->view('layouts/application', $data);
    }
    else {
      // user input is correct, register user
      $data = [
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => hash_password($this->input->post('password'))
      ];
      $this->user->register($data);
      $this->session->set_flashdata('message', 'You have been registered');
      redirect('home', 'refresh');
    }
  }

  public function login()
	{
    $data['yield'] = 'users/login';
		$data['title'] = 'Log in';
    $this->load->view('layouts/application', $data);
  }

  public function auth()
	{
    //validate user input
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[35]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]');

    //if user input is incorrect
    if($this->form_validation->run() === false)
    {
      $data['yield'] = 'users/login';
      $this->load->view('layouts/application', $data);

    }
    else {
      //user is authenticated, log in
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $auth = $this->user->authenticate($username, $password);

      if($auth)
      {
        $data = [
          'is_logged_in' => true,
          'username' => $this->input->post('username')
        ];
        $this->session->set_userdata($data);
        redirect('forum');
      }
      else {
        $data['yield'] = 'users/login';
        $this->load->view('layouts/application', $data);
      }
    }
  }

  public function logout(){
    $this->session->sess_destroy();
    $this->session->set_flashdata('message', 'You have been logged out');
    redirect('/', 'refresh');
  }
}
