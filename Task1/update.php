<?php
$conn = mysqli_connect('localhost', 'tanishq', 'tanishq', 'eiancoder');
if (!isset($_GET["id"])) {
    header("Location: index.php?message=please select the delete button");
}
$id = $_GET["id"];
$sql = "SELECT * FROM user WHERE id=$id";
$result = mysqli_query($conn, $sql);
$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
if (!(empty($ans))) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>Update Form</title>
    </head>

    <body class="container">
        <div class="container center_div">
            <form method="POST" action="update_back.php">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="id" class="form-control" value="<?php echo $ans[0]['id'] ?>" name="id" required hidden>
                    <input type="email" class="form-control" id="email" placeholder="<?php echo $ans[0]['email'] ?>" name="email" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <button type="submit" name='submit' class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: index.php?message=please dont change the values manually");
}
