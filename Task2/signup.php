<?php
if (!empty($_GET['message'])) {
    $message = $_GET['message'];
    echo "<h2 class='container center_div'>";
    echo htmlspecialchars($message);
    echo "</h2>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Form</title>
</head>

<body class="container">
    <table class="table table-striped">
        <div class="container center_div">
            <form method="POST" action="signup_back.php">
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="pass" required></br></td>
                </tr>
                <tr>
                    <td>Confirmed Password:</td>
                    <td><input type="password" name="cpass" required></br></td>
                </tr>
                <tr>
                    <td>Info:</td>
                    <td><input type="text" name="info" required></br></td>
                <tr>
                <tr>
                    <td><input type="submit" name="signup" value="Signup"></br></td>
                    <td><a href="login.php">Login</a></td>
                </tr>
            </form>

        </div>
    </table>
</body>

</html>