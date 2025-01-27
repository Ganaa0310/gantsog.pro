<?php
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'connect.php';
        $u_logo=null;
        // echo $u_logo;
        if(isset($_FILES['u_logo'])){
            $folder='upload/';
            $logoName=basename($_FILES['u_logo'] ['name']);
            $u_logo = $folder . $logoName;
            // upload folder dotoroo zurgaa hadgalah
            echo $u_logo;
            move_uploaded_file($_FILES['u_logo']['tmp_name'], $u_logo);
        }else{
            echo "No image uploaded";
        }
        $u_name=$_POST['u_name'];
        $u_email=$_POST['u_email'];
        $u_age=$_POST['u_age'];
        $u_phone=$_POST['u_phone'];
        $u_password=$_POST['u_password'];
        $u_role=$_POST['u_role'];
        $insert_sql="INSERT INTO user VALUES
        (null, '$u_name', '$u_email', '$u_age', '$u_phone', '$u_password', '$u_role', '$u_logo')";
        $result=mysqli_query($conn, $insert_sql);
        if($result){
            header("location:d_users.php");
        }else{
            echo mysqli_error($conn);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit users</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include 'menu.php' ; ?>
            </div>
            <div class="col-md-9 mt-5">
                <h3>Add users</h3>
                <form method="POST" enctype="multipart/form-data">
                <label for="">Logo</label>
                <input type="file" class="form-control" name="u_logo" required>
                <img src="<?php echo $user['u_logo'] ?>" name="u_logo" width="50px" alt="">
                <br>
                <label>Username</label>
                <input class="form-control" type="name" name="u_name" required>
                <label for="">User's email</label>
                <input class="form-control" type="email" name="u_email" required>
                <label for="">User's age</label>
                <input class="form-control" type="age" name="u_age" required> 
                <label for="">User's phone</label>
                <input class="form-control" type="phone" name="u_phone" required>
                <label>Password</label>
                <input class="form-control" type="password" name="u_password" required>
                <select name="u_role" class="form-control mt-3">
                <option>Select role</option>
                <option value="user">user</option>
                <option value="admin">admin</option>
                </select>
                <button class="mt-3 btn btn-primary" type="submit">Add user</button>
                </form>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</body>
</html>