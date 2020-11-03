<?php
include('header.php');
include('navbar.php');
include('sidenav.php');
?>

<body>
  <div class="container">
    <h2>Table of the User databse</h2>
    <p>Only insertion is allowed</p>
    <table class="table table-dark table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Email</th>
          <th>Password</th>
          <th>Info</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($users)) {
          foreach ($users as $user) { ?>
            <tr>
              <td><?php echo $user['id']; ?></td>
              <td><?php echo $user['email']; ?></td>
              <td><?php echo $user['pass']; ?></td>
              <td><?php echo $user['info']; ?></td>
            </tr>
          <?php }
        } else { ?>
          <tr>
            <td>
              The data base is EMPTY!
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php include("footer.php"); ?>