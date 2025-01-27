<?php
    session_start();
    include 'connect.php';
    $id = $_GET['delId'];
    if(isset($id)){
        $delete_query = "DELETE FROM user where u_id=$id";
        $result = mysqli_query($conn, $delete_query);
        if($result){
            header('location:d_users.php');
        }else{
            echo mysqli_error($conn);
        }
    }
?>