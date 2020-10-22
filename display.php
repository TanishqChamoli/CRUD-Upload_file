<?php
if (!empty($_GET['message'])) {
    $message = $_GET['message'];
    echo "<h2 class='container center_div'>";
    echo htmlspecialchars($message);
    echo "</h2>";
}
$conn = mysqli_connect('localhost', 'tanishq', 'tanishq', 'eiancoder');
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Pass</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <?php
    for ($x = 0; $x < sizeof($ans); $x++) {
    ?>

        <tbody>
            <tr>
                <th scope="row"><?php echo $x; ?></th>
                <td><?php echo "<p>" . $ans[$x]['id'] . "</p>" ?></td>
                <td><?php echo "<p>" . $ans[$x]['email'] . "</p>" ?></td>
                <td><?php echo "<p>" . $ans[$x]['pass'] . "</p>" ?></td>
                <td> <?php echo "<p>" . $ans[$x]['img'] . "</p>" ?></td>
                <td>
                    <a href="<?php echo 'update.php?id=' . $ans[$x]['id'] ?>">Update</a>
                </td>
                <td>
                    <a href="<?php echo 'delete.php?id=' . $ans[$x]['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php
    }
        ?>
        </tbody>
</table>