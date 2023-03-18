<?php
require_once('./Db.php');

if ($_GET) {
  $id = $_GET['id'];
  $user = new User();
  
  $user->remove($id);
}