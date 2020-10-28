<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Create</title>
</head>

<body class="container">
    <div class="container center_div">
        <h4><?php if (!empty($result)) {print($result);}?></h4>
        <h2>ENTER THE DATA TO BE STORED:</h2>
        <?php if (!empty($update)) { ?>
            <form method="POST" action="<?php echo base_url() . 'user/up_update' ?>">
                <input type="hidden" name="id" value=<?php echo $update['id']; ?>>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" value=<?php echo $update['email']; ?> name="email">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="text" class="form-control" id="pwd" value=<?php echo $update['pass']; ?> name="password" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="pwd">Info:</label>
                    <input type="text" class="form-control" id="info" value="<?php print($update['info']); ?>" name="info" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
            <a href="<?php echo base_url() . "user/create" ?>">Go Back</a>
        <?php } else { ?>
            <form method="POST" action="<?php echo base_url() . 'user/save' ?>">
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
        <?php } ?>
        <table class="table table-image">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pass</th>
                    <th scope="col">Info</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)) {
                    foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['pass']; ?></td>
                            <td><?php echo $user['info']; ?></td>
                            <td>
                                <a href="<?php echo base_url() . "user/update/" . $user['id'] ?>">UPDATE</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url() . "user/delete/" . $user['id'] ?>">DELETE</a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td>
                            The data base is EMPTY!
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>