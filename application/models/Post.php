<?php

class Post extends CI_Model
{
   public function create()
   {

      $users = [];
      $users = $this->user->all();

     $config = [
       'allowed_types' => 'jpg|gif|png',
       'upload_path' => UPLOAD_PATH
     ];
    //  $econfig = [
    //    'protocol' => 'smtp',
    //    'smtp_host' =>'ssl://smtp.googlemail.com',
    //    'smtp_port' => 465,
    //    'smtp_user' => 'alphatauron@gmail.com',
    //    'smtp_pass' => ''
    //  ];
     $this->load->library('upload', $config);
     $this->load->library('email');
     $this->upload->do_upload();
     $image = $this->upload->data();
      $data = [
            'userfile' => $this->upload->data('file_name'),
            'username' => $this->input->post('username'),
            'comment' => $this->input->post('comment'),
            'added' => $this->input->post('added')
        ];

        $this->db->insert('posts', $data);

        //send email to all users
        //$this->email->attach(UPLOAD_PATH . '/' . $data['userfile']);
        foreach($users as $user)
        {
          $this->email->from('fxforum.url.ph', 'Fx forum');
          $this->email->to($user->email);
          $this->email->subject('New post added by ' . $this->session->username);
          $this->email->message($data['comment']);
          $this->email->send();
        }

   }

   public function all()
   {

     $this->db->order_by('id', 'DESC');
     $get = $this->db->get('posts', 5, $this->uri->segment(2));
     return $get->result();
   }

   public function num_rows()
   {
     $num_rows = $this->db->get('posts');
     return $num_rows->num_rows();
   }

   //search for users posts
   public function search()
   {
     $searched = $this->input->get('search');
     $query = $this->db->where('username', $searched)
                   ->order_by('id', 'DESC')
                   ->get('posts');
     return $query->result();
   }

   public function delete($id, $file_name)
   {
     $this->db->where('id', $id);
     $this->db->delete('posts');
     unlink(UPLOAD_PATH . '/' . $file_name);
   }
}
