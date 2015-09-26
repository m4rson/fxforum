<?php

class User extends CI_Model
{
  public function register($data){
    $insert = $this->db->insert('users', $data);
    return $insert;
  }

  public function authenticate($username, $password){
    $query = $this->db->where('username', $username)
                      ->where('password', hash_password($password))
                      ->limit(1)
                      ->get('users');

    if($query->num_rows() == 1)
    {
      return $query->row();
    }
    else return false;
  }

  public function all(){
    $get = $this->db->get('users');
    return $get->result();
  }
}
