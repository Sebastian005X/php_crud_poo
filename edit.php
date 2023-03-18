<?php
require_once('./Db.php');

if ($_POST) {
  $user = new User();
  $id = $_GET['id'];
  $name = $_POST['name'];
  $last_name = $_POST['last_name'];

  $user->update($id, $name, $last_name);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit user</title>
</head>
<body>
  <h1>Edit user</h1>
  <form action="#" method="post">
    <div>
      <label for="name">Name</label>
      <input type="text" name="name" value=<?= $_GET['name'] ?>>
    </div>
    <div>
      <label for="last_name">Last name</label>
      <input type="text" name="last_name" value=<?= $_GET['last_name'] ?>>
    </div>
    <button type="submit">Edit user</button>
  </form>
</body>
</html>