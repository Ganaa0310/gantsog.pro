<?php
	session_start();
	include 'connect.php';
	$id = $_GET['editId'];
	echo $id;
	$select_sql = "SELECT * FROM chatroom WHERE ch_id=$id";
	$result = mysqli_query($conn,$select_sql);
	$chatroom = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$name = $chatroom[0]['ch_name'];
	$type = $chatroom[0]['ch_type'];
	$image = $chatroom[0]['image'];
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$ch_name = $_POST['ch_name'];
		$ch_type = $_POST['ch_type'];
		$image = $_POST['image'];
		$image=null;
		if(isset($_FILES['image'])){
			$folder='upload/';
			$imageName=basename($_FILES['image'] ['name']);
			$image = $folder . $imageName;
			echo $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $image);
		}else{
			echo "No image uploaded";
		}
		$update_sql = "UPDATE chatroom SET ch_name='$ch_name', ch_type='$ch_type', image='$image' WHERE ch_id=$id";
		$result = mysqli_query($conn,$update_sql);
		if($result){
			header('location:d_chats.php');
		}else{
			echo mysqli_error($conn);
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit chatroom</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="dashboard.css">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<?php include 'menu.php'; ?>
				</div>
				<div class="col-md-9">
					<h3>Edit chatroom</h3>
					<form method="POST"  enctype="multipart/form-data">
						<label for="">Image</label>
						<input type="file" class="form-control" name="image" required>
						<img src="<?php echo $image ?>" width="50px" name="image" alt="">
						<br>
						<select name="ch_name" class="mt-3 form-control">
							<option><?php echo $name?></option>
							<option value="HTML">HTML</option>
							<option value="CSS">CSS</option>
							<option value="JS">JS</option>
							<option value="PYTHON">PYTHON</option>
						</select>
						<select name="ch_type" class="mt-3 form-control">
							<option><?php echo $type?></option>
							<option value="0">Public</option>
							<option value="1">Private</option>
						</select>
						<button class="mt-3 btn btn-primary" type="submit"  >Edit chatroom</button>
					</form>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	</body>
</html>