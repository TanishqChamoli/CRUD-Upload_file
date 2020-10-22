<?php
if (!isset($_GET["id"])) {
    header("Location: index.php?message=please select the delete button");
}
$conn = mysqli_connect('localhost', 'tanishq', 'tanishq', 'eiancoder');

$id = $_GET["id"];
$sql = "DELETE FROM user WHERE id ='$id'";
$result = mysqli_query($conn, $sql);

if ($result == 0) {
    header("Location: display.php?message=Deleted the user");
} else {
    header("Location: display.php?message=No user found");
}
