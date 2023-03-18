<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users test</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <h2>Add user</h2>
  <form action="./create.php" method="post">
    <div>
      <label for="name">Name</label>
      <input type="text" name="name">
    </div>
    <div>
      <label for="last_name">Last name</label>
      <input type="text" name="last_name">
    </div>
    <button type="submit">Add user</button>
  </form>

  <h1>Users</h1>
  <section>
    <?php 
    require_once('./Db.php'); 
    $user = new User();
    $users = $user->get_all(); 
    ?>

    <?php foreach ($users as $user): ?>
      <article class="user">
        <div>
          <span><b>Name: </b><?= $user['name'] ?></span><br>
          <span><b>Last name: </b><?= $user['last_name'] ?></span>
        </div>
        <div class="user_buttoms">
          <a 
            href=<?= "./edit.php?id=$user[id]&name=$user[name]&last_name=$user[last_name]"?> 
            class="buttom_edit">
          Edit
        </a>
          <a href=<?= "./remove.php?id=$user[id]" ?> class="buttom_remove">Remove</a>
        </div>
      </article>
    <?php endforeach; ?>
    
  </section>
</body>
</html>