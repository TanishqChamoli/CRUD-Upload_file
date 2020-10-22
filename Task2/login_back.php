<?php
function return_back($message)
{
    header("Location: login.php?message=$message");
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $conn = mysqli_connect('localhost', 'tanishq', 'tanishq', 'eiancoder');
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $hashed_password = $ans[0]['pass'];
    $re = password_verify($pass, $hashed_password);
    if ($re) {
        // we will start the session and save a variable then we will move to the other page
        session_start();
        $_SESSION["id"] = $ans[0]['id'];
        header("Location: login.php");
    } else {
        return_back("Login Failed");
    }
} else {
    return_back("Don't play games");
}
