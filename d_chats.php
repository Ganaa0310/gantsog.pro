<?php
	session_start();
	include 'connect.php';
	$select_sql = 'SELECT * FROM chatroom';
	$result = mysqli_query($conn,$select_sql);
	$chatrooms = mysqli_fetch_all($result,MYSQLI_ASSOC);
	$id=1;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Chatroom</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="dashboard.css">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<?php include 'menu.php'; ?>
				</div>
				<div class="col-md-9 mt-5">
					<h3>Chatroom</h3>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Chatroom name</th>
								<th>Chatroom type</th>
								<th>Chatroom image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($chatrooms as $chatroom){ ?>
							<tr>
								<td><?php echo $id++?></td>
								<td><?php echo $chatroom['ch_name']?></td>
								<td><?php echo $chatroom['ch_type']?></td>
								<td><img src="<?php echo $chatroom['img_url'] ?>" name="image" width="50px" alt=""></td>
								<td>
									<a class="btn btn-warning" href="editCh.php?editId=<?php 
									echo $chatroom['ch_id'] ?>">Edit</a>
									<a class="btn btn-danger" href="deleteCh.php?deleteId=<?php
									echo $chatroom['ch_id'] ?>">Delete</a>
								</td>
							</tr>
						<?php }?>
						</tbody>
					</table>
					<a class="btn btn-primary" href="create_chatroom.php">create chatroom</a>
				</div>
			</div>
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	</body>
</html>