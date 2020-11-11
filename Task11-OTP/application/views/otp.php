<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['message'])) {
        print("<h2>" . $_GET['message'] . "</h2>");
    }
    ?>
    <form class="container center_div" method="post" action="<?php echo base_url() . 'index.php/user/otp_back' ?>">
        <div class="form-group">
            <label for="Mobile">Contact No.:</label>
            <input type="mobile" class="form-control" name="mobile" required placeholder="Enter mobile number">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>