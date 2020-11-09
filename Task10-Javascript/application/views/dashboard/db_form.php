<?php
include('header.php');
include('navbar.php');
include('sidenav.php');
?>

<body class="sb-nav-fixed">
    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <?php
                if (empty($update)) { ?>
                    <form method="POST" action="<?php echo base_url() . 'index.php/Admin/own_form_insert' ?>">
                        <h4><?php if (!empty($result)) {
                                print($result);
                            } ?></h4>
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
                <?php
                } else {
                ?>

                    <form method="POST" action="<?php echo base_url() . 'index.php/Admin/up_update'?>">
                        <h4><?php if (!empty($result)) {
                                print($result);
                            } ?></h4>
                        <input type="text" value="<?php echo $update['id']; ?>" name="id" hidden>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <?php $update['email']; ?>
                            <input type="email" class="form-control" id="email" value="<?php echo $update['email']; ?>" name="email">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="text" class="form-control" id="pwd" value="<?php echo $update['pass']; ?>" name="password" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Info:</label>
                            <input type="text" class="form-control" id="info" value="<?php echo $update['info']; ?>" name="info" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">update</button>
                    </form>
                <?php
                }
                ?>
            </div>
        </main>

        <?php include('footer.php'); ?>