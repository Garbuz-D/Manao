<?php
if(isset($_POST)){
include 'JSONDB.php';
include 'error_msg.php';

$msg = new error_msg(array_keys($_POST));

$db = new JSONDB('db.json');

$user;
foreach($_POST as $key => $value){
  $user[$key] = htmlspecialchars(trim($value));
}

if(strlen($user[login]) < 6){
  $msg->error('login', 'login must be at least 6 characters long');
}else if(preg_match("/ +/", $user[login])){
  $msg->error('login', "login can't contain spaces");
}else if($db->read('login', $user[login])){
  $msg->error('login', 'this login already exists in database');
} 

if(!preg_match("/^\w*$/", $user[password])){
  $msg->error('password', 'password must contain only alphanumeric characters');
}else if(strlen($user[password]) < 6){
  $msg->error('password', 'password must be at least 6 characters long');
}

if($user[password] != $user[confirm_password]){
  $msg->error('confirm_password', 'entered string does not matches the password');
}

if (!filter_var($user[email], FILTER_VALIDATE_EMAIL)) {
  $msg->error('email', 'entered email is not valid');
}else if($db->read('email', $user[email])){
  $msg->error('email', 'this email is already used');
}

if(!preg_match("/^[a-zA-Z]*$/", $user[name])){
  $msg->error('name', 'name must contain only letters');
}else if(strlen($user[name]) < 2){
  $msg->error('name', 'name must be at least 2 characters long');
}

$user[salt] = utf8_encode(openssl_random_pseudo_bytes(4));
$user[hash] = md5($user[password] . $user[salt]);
unset($user[password]);
unset($user[confirm_password]);

if($msg->OK()){
  $db->create($user);
  $db->flush();
  session_start();
  setcookie('name', $user[name]);
}

echo $msg->json();
}
?>