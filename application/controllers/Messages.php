<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller{

  public function index()
  {
    if($this->session->is_logged_in)
    {
      $data['yield'] = 'messages/index';
      $data['title'] = 'Chat';
      $data['messages'] = $this->message->all();
      $this->load->view('layouts/application', $data);
    }else {
      redirect('login', 'refresh');
    }
  }

  public function create()
  {
    $this->form_validation->set_rules('message', 'Message', 'trim|required');
    if($this->form_validation->run() === false)
    {
      $data['yield'] = 'messages/index';
      $data['messages'] = $this->message->all();
      $this->load->view('layouts/application', $data);
    }
    else{
      $data = [
        'message' => $this->input->post('message'),
        'username' => $this->session->userdata('username'),
        'added' => $this->input->post('added')
      ];
      $this->message->create($data);
      redirect('chat', 'refresh');
    }
  }

}
