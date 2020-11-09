<?php
include('header.php');
include('navbar.php');
include('sidenav.php');
?>

<body class="sb-nav-fixed">
  <div id="layoutSidenav_content">
    <main>
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
              <th>Update</th>
              <th>Delete</th>
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
                  <td>
                    <a href="<?php echo base_url() . "Admin/update_user/" . $user['id'] ?>">UPDATE</a>
                  </td>
                  <td>
                    <input type="button" onClick="deleteid(<?php echo $user['id']; ?>)" name="Delete" value="DELETE">
                    <script>
                      function deleteid(id) {
                        if (confirm("Do you want to delete the user?!")) {
                          window.location.href = "<?php echo base_url() . "Admin/delete_user/" ?>" + id + "";
                          return true
                        } 
                      }
                    </script>
                    <!-- <a href="<?php echo base_url() . "Admin/delete_user/" . $user['id'] ?>">DELETE</a> -->
                  </td>
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
    </main>
    <?php include("footer.php"); ?>