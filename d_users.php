<?php
    session_start();
    include 'connect.php';
    $select_sql="SELECT * from user";
    $result=mysqli_query($conn, $select_sql);
    $users=mysqli_fetch_all($result, MYSQLI_ASSOC);
    $id=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-3">
    <?php include 'menu.php' ; ?>
    </div>
    <div class="col-md-9 mt-5">
    <h3>Users</h3>
    <table class="mt-4 table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User's name</th>
                <th>User's email</th>
                <th>User's age</th>
                <th>Users's phone</th>
                <th>Users's password</th>
                <th>User's role</th>
                <th>Users's photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user) { ?>
            <tr>
                <td><?php echo $id++ ?></td>
                <td><?php echo $user['u_name'] ?></td>
                <td><?php echo $user['u_email'] ?></td>
                <td><?php echo $user['u_age'] ?></td>
                <td><?php echo $user['u_phone'] ?></td>
                <td><?php echo $user['u_password'] ?></td>
                <td><?php echo $user['u_role'] ?></td>
                <td><img src="<?php echo $user['u_logo'] ?>" name="u_logo" width="50px"></td>
                <td>
                    <a class="btn btn-warning" href="u_edit.php?editId=<?php echo $user['u_id'] ?>">Edit</a>
                    <a class="btn btn-danger" href="u_delete.php?delId=<?php echo $user['u_id'] ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a class="mt-3 btn btn-primary" href="add_user.php">Add user</a>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>