<?php

if(isset($_POST)){
include 'JSONDB.php';
include 'error_msg.php';

$msg = new error_msg(array_keys($_POST));

$db = new JSONDB('db.json');

$user = $db->read('login', htmlspecialchars($_POST[login]));

if(!$user){
  $msg->error('login', 'there is no user with entered login in database, check the input or sign up');
}else if(md5($_POST[password] . $user[salt]) != $user[hash]){
  $msg->error('password', 'entered password is incorrect');
}

if($msg->OK()){
  session_start();
  setcookie('name', $user[name]);
}
echo $msg->json();
}
?>
