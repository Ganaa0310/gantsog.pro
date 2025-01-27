<?php
    session_start();
    include 'connect.php';
    $count_sql="SELECT COUNT(u_name) as count from user";
    $result=mysqli_query($conn, $count_sql);
    $users=mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="dashboard.css">
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-3">
<?php include 'menu.php' ; ?>
</div>
<div class="col-md-3 mt-5">
<h3>Welcome to Admin dashboard</h3>
</div>
<div class="col-md-6 mt-5">
	<h5>All users:</h5>
    <?php 
        print_r($users[0]['count'] )
    ?>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>