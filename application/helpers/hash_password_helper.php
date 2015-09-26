<?php

function hash_password($password)
{
  return sha1(md5($password));
  //return password_hash($password, PASSWORD_DEFAULT);
}
