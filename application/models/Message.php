<?php

class Message extends CI_Model{

  public function all()
  {
    $this->db->order_by('id', 'DESC');
    $get = $this->db->get('messages');
    return $get->result();
  }

  public function create($data)
  {
    $insert = $this->db->insert('messages', $data);
    return $insert;

  }
}
