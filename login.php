<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        require 'connect.php';
        $u_email_name = $_POST['u_email'];
        $u_password = $_POST['u_password'];
        $select_query = "SELECT * FROM user WHERE
        (u_email='$u_email_name' OR u_name='$u_email_name') AND u_password='$u_password'";
        // echo $select_query;
        $run = mysqli_query($conn,$select_query);
        
        if($run){
            $check = mysqli_num_rows($run);
            if($check>0){
                // header -> uur page ruu shijluulne
                // session -> login hiij bga hereglegchiig hadgalah
                session_start();
                $data = $run->fetch_assoc();
                $_SESSION['u_email'] = $data['u_email'];
				$_SESSION['u_name'] = $data['u_name'];
                $_SESSION['u_password'] = $data['u_password'];
                $_SESSION['u_role'] = $data['u_role'];
				$_SESSION['u_id']=$data['u_id'];
                
                if($_SESSION ['u_role']=='admin'){
					header('location:admin.php');
				}else if ($_SESSION['u_role']=='user'){
					header('location:profile.php');
				}
            }
        }else{
            mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="home.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>


<body class="loginbody">
<?php include 'header.php'?>
    <form name="form" action="login.php" method="POST">
        <div class="form" data-aos="zoom-in" data-aos-duration="2000">
            <h1 id="login" >Login</h1>
            <p class="dd">Don't have an register? <a href="register.php" name="submit">Click her to register</a></p>
                <input class="Ps" type="text" id="email" name="u_email" placeholder="Email or name"/></br></br>
                <input class="Ps" type="password" id="password" name="u_password" placeholder="Password"/></br></br>
                        <input type="checkbox" id="check">
                <label for="rememberCheck" id="">Remember me</label></br>
                <input type="submit" id="btn" value="Login"/>
        </div>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
          </script>
</body>
</html>