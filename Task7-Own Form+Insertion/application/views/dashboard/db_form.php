<?php
include('header.php');
include('navbar.php');
include('sidenav.php');
?>

<body >
    <h4><?php if (!empty($result)) {
            print($result);
        } ?></h4>
    <form method="POST" action="<?php echo base_url() . 'index.php/Admin/own_form_insert' ?>">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="pwd">Info:</label>
            <input type="text" class="form-control" id="info" placeholder="Enter Data" name="info" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php include('footer.php'); ?>