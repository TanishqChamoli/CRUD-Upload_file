<?php
if (!empty($_GET['message'])) {
    $message = $_GET['message'];
    echo "<h2 class='container center_div'>";
    echo htmlspecialchars($message);
    echo "</h2>";
}
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $conn = mysqli_connect('localhost', 'tanishq', 'tanishq', 'eiancoder');
    $sql = "SELECT * FROM user WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $info = $ans[0]['info'];
    $id = $ans[0]['id'];
    echo "<h1>" . $info . "</h1>";
    echo "<a href='logout.php?id=" . $id . "'>Logout</a>";
} else {
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
                <form method="POST" action="login_back.php">
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="pass" required></br></td>
                    </tr>
                    <td><input type="submit" name="login" value="Login"></br></td>
                    <td><a href="signup.php">Signup</a></td>
                    </tr>
                </form>

            </div>
        </table>
    </body>

    </html>
<?php
}
?>