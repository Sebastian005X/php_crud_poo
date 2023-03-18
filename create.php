<?php
require_once('./Db.php');

if ($_POST) {
  $user = new User();
  $name = $_POST['name'];
  $last_name = $_POST['last_name'];
  
  $user->insert($name, $last_name);
}