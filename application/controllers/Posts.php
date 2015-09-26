<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller{

	public function index()
	{
    if($this->session->is_logged_in)
    {

			//load pagination library and set configuration
			$this->load_pagination();

      $data['yield'] = 'posts/index';
			$data['title'] = 'Forum';
      $data['posts'] = $this->post->all();
      $this->load->view('layouts/application', $data);
    }
    else{
      redirect('login', 'refresh');
    }

	}

  public function create()
  {
  $this->form_validation->set_rules('comment', 'Comment', 'trim|required|min_length[2]');
  if($this->form_validation->run() === false)
  {
		$this->load_pagination();
    $data['yield'] = 'posts/index';
    $data['posts'] = $this->post->all();
    $this->load->view('layouts/application', $data);
  }
  else{
    $this->post->create();
    $this->session->set_flashdata('message', 'Post was created');
    redirect('forum', 'refresh');
   }
  }

  public function delete()
	{
    $id = $this->uri->segment(3);
		$file_name = $this->uri->segment(4);
    $this->post->delete($id, $file_name);
    $this->session->set_flashdata('message', 'Post was deleted');
    redirect('forum', 'refresh');
  }

	//search for users posts
	public function search()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load_search_pagination();
			$data['yield'] = 'posts/search';
			$data['title'] = 'Search';
			$data['users'] = $this->user->all();
			$data['searched'] = $this->post->search();
			$this->load->view('layouts/application', $data);
		}else {
			redirect('login', 'refresh');
		}

	}

	//pagination load function
	public function load_pagination()
	{
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/codeigniters/fxforum/forum/';
		$config['total_rows'] = $this->post->num_rows();
		$config['per_page'] = 5;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);
	}
  //search pagination load function
	public function load_search_pagination()
	{
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/codeigniters/fxforum/posts/search';
		$config['total_rows'] = $this->post->num_rows();
		$config['per_page'] = 2;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);
	}
}
