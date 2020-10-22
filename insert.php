<?php
$uname = $_POST['email'];
$pass = $_POST['pswd'];
// $c_pass = $_POST["C_password"];
echo $uname . ":" . $pass;

// echo $_FILES["fileToUpload"]['name'];
// echo basename($_FILES["fileToUpload"]["name"]);

$conn = mysqli_connect('localhost', 'tanishq', 'tanishq', 'eiancoder');

$target_dir = "uploads/";
$fileName = basename($_FILES["fileToUpload"]["name"]);
$targetFilePath = $target_dir . $fileName;
echo $targetFilePath;

$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$sql2 = "SELECT * FROM user WHERE email = '$uname'";
$result = mysqli_query($conn, $sql2);
$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
if (!empty($ans)) {
    header("Location: index.php?message=choose a unique username");
    exit();
} else if (!empty($_FILES["fileToUpload"]["name"])) {
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user(email,pass,img) VALUES('$uname','$hash','$fileName')";
            if (mysqli_query($conn, $sql)) {
                header("Location: index.php?message=successfully added that account in admins");
            } else {
                echo "connection error!!" . mysqli_error($conn);
            }
        }
    }
} else {
    header("Location: index.php?message=$statusMsg");
}
// echo $statusMsg;
