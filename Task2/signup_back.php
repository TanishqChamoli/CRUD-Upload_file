<?php
$email = $_POST['email'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
$info = $_POST['info'];
if ($cpass != $pass) {
    header("Location: signup.php?message=passwords are diffrent");
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (!empty($_POST["pass"]) && ($_POST["pass"] == $_POST["cpass"])) {
    $password = test_input($_POST["pass"]);
    $cpassword = test_input($_POST["cpass"]);
    $passwordErr = "False";
    if (strlen($_POST["pass"]) <= '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    } elseif (!preg_match("#[0-9]+#", $password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    } elseif (!preg_match("#[A-Z]+#", $password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    } elseif (!preg_match("#[a-z]+#", $password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
    if ($passwordErr == "False") {
        $conn = mysqli_connect('localhost', 'tanishq', 'tanishq', 'eiancoder');
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user(email,pass,info) VALUES('$email','$hash','$info')";
        if (mysqli_query($conn, $sql)) {
            header("Location: signup.php?message=successfully added that account");
        } else {
            // echo "connection error!!" . mysqli_error($conn);
            header("Location: signup.php?message=" . mysqli_error($conn));
        }
    } else {
        header("Location: signup.php?message=$passwordErr");
    }
}
