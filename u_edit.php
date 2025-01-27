<?php
    session_start();
    include 'connect.php';
    $id = $_GET['editId'];
    echo $id;
    //select
    $select_sql = "SELECT * FROM user WHERE u_id=$id";
    //ajiluulan
    $result = mysqli_query($conn, $select_sql);
    $user=mysqli_fetch_all($result, MYSQLI_ASSOC);
    $name = $user[0]['u_name'];
    $email=$user[0]['u_email'];
    $age=$user[0]['u_age'];
    $phone=$user[0]['u_phone'];
    $password = $user[0]['u_password'];
    $role = $user[0]['u_role'];
    $logo = $user[0]['u_logo'];
   if($_SERVER['REQUEST_METHOD']=='POST'){
        $u_name=$_POST['u_name'];
        $u_email=$_POST['u_email'];
        $u_age=$_POST['u_age'];
        $u_phone=$_POST['u_phone'];
        $u_password=$_POST['u_password'];
        $u_role=$_POST['u_role'];
        $u_logo=$_POST['u_logo'];
		$u_logo=null;
		if(isset($_FILES['u_logo'])){
			$folder='upload/';
			$u_logoName=basename($_FILES['u_logo'] ['name']);
			$u_logo = $folder . $u_logoName;
			echo $u_logo;
			move_uploaded_file($_FILES['u_logo']['tmp_name'], $u_logo);
		}else{
			echo "No u_logo uploaded";
		}
		$update_sql = "UPDATE user SET u_name='$u_name', u_email='$u_email', u_age='$u_age', u_phone='$u_phone', u_password='$u_password', u_role='$u_role', u_logo='$u_logo' WHERE u_id=$id";
		$result = mysqli_query($conn,$update_sql);
		if($result){
			header('location:d_users.php');
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
                <h3>Edit users</h3>
                <form method="POST" enctype="multipart/form-data">
                <label for="">Logo</label>
                <input type="file" class="form-control" name="u_logo" value="<?php echo $logo ?>" required>
                <img src="<?php echo $logo ?>" width="50px" name="u_logo" alt="">
                <br>
                <label>Username</label>
                <input class="form-control" type="name" name="u_name" value="<?php echo $name ?>">
                <label for="">User's email</label>
                <input class="form-control" type="email" name="u_email" value="<?php echo $email ?>">
                <label for="">User's age</label>
                <input class="form-control" type="age" name="u_age" value="<?php echo $age ?>">
                <label for="">User's phone</label>
                <input class="form-control" type="phone" name="u_phone" value="<?php echo $phone ?>">
                <label>Password</label>
                <input class="form-control" type="password" name="u_password" value="<?php echo $password ?>">
                <select name="u_role" class="form-control mt-3">
                <option value=""><?php echo $role ?></option>
                <option>Select role</option>
                <option value="user">user</option>
                <option value="admin">admin</option>
                </select>
                <button class="mt-3 btn btn-primary" type="submit">Edit user</button>
                </form>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</body>
</html>