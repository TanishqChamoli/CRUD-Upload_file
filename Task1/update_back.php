<?php
if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $conn = mysqli_connect('localhost', 'tanishq', 'tanishq', 'eiancoder');
    $sql = "UPDATE user SET email='$email' WHERE id ='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result == 1) {
        echo "Updated the email!";
        echo "<h3><a href='display.php'>Return back</a></h3>";
        exit();
    } else {
        echo "There has been some errors so please retry!";
        echo "<h3><a href='display.php'>Return back</a></h3>";
        exit();
    }
} else {
    header("Location: index.php");
}
