<?php 
	include 'check.php';
    session_start();
    $ch_id = $_GET['chatId'];
    $u_id = $_SESSION['u_id'];
	if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'connect.php';
        $m_id = NULL;
        $m_message = $_POST['m_message'];
        $insert_sql = "INSERT INTO message VALUES ('$m_id','$ch_id','$u_id','$m_message')";
        $result = mysqli_query($conn, $insert_sql);
        if($result){
        }else{
            echo "Error detected.";
        }
        
    }
    include 'connect.php';
    $select_sql = "SELECT m_message, u_name FROM message 
                   JOIN user ON message.u_id = user.u_id 
                   WHERE ch_id = '$ch_id' ORDER BY m_id ASC";
    $s_result = mysqli_query($conn, $select_sql);
    $message = mysqli_fetch_all($s_result,MYSQLI_ASSOC);
// print_r($message);
    $select2_sql="SELECT DISTINCT u_name FROM message 
                   JOIN user ON message.u_id = user.u_id 
                   WHERE ch_id = '$ch_id' ORDER BY m_id ASC";;
    $resultt= mysqli_query($conn, $select2_sql);
    $user=mysqli_fetch_all($resultt, MYSQLI_ASSOC);



    
?>
<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="home.css">
        <style>
            body{
    background-color:#eff2f6 !important;
    
}
.box{
    width:1000px;
    height:600px;
    background-color:white;
    margin-left:182.5px;
    margin-top:10px;
    border-radius:10px;
    border: 2px solid #fcb73f;
}
.person{
    width:35%;
    height:600px;
    border:2px solid #efefef;
    
}
.chat{
    width:65%;
    height:500px;
    position:relative;
    left:35%;
    bottom:600px;
    
}
.text{
    width:65%;
    height:100px;
    border:2px solid #efefef;
    position:relative;
    left:35%;
    bottom:600px;
}
.person .search{
    width:80%;
    padding:5px;
    padding-left:10px;
    padding-right:10px;
    margin-top:20px;
    margin-left:10%;
    border:1px solid #c1c1c1;
    border-radius:10px;
}
.person i{
    position:relative;
    right:25px;
}
.chat .contact{
    width:100%;
    height:100px;
}
hr{
    width:80%;
    position:relative;
    left:10%;
}
.contact h1{
    text-align:center;
    position:relative;
    top:35px;
    color:#f98437;
}
.text input{
    margin-left: 20px;
}
.text button{
    margin-left: 10px;
    border:1px solid black;
    border-radius:3px;
    
}
.text .sub{
    margin-top:30px;
    padding:5px;
    padding-left:10px;
    width:500px;
    border:1px solid #c1c1c1;
    border-radius:5px;
}
.text .file{
    margin-left:25px;
    background-color:#f1f1f1;
    transition:0.5s;
}
.text .file i{
    transition:0.5s;
}
.text .file:hover{
    background-color:#4e4e4e;
}
.text .file i:hover{
    color:white;
}
.text .send{
    transition:0.5s;
}
.text .send i{
    transition:0.5s;
    
}
.text .send:hover{
    background-color:#002bff;
}
.text .send i:hover{
    color:white;
}
.per img{
    width:60px;
    height:60px;
    border-radius:50%;
    margin-top:5px;
    margin-left:40px;
}
.per h3{
    font-size:20px;
    position:relative;
    left:120px;
    padding:10px;
}
.per{
    margin-top:10px;
    width: 80%;
    height:60px;
    position:relative;
    top:30px;
}
.person .return{
    text-decoration:none;
    color:#ff4200;
    position:relative;
    top:30px;
    left:80px;
    font-size:20px;
    transition:0.5s;
}
.person .return:hover{
    color:#ffee49;
}
.per a{
    text-decoration:none;
    color:black;
    cursor:pointer;
    transition:0.3s;
}
.per a:hover{
    color:#ff4200;
}
.mess{
    width: 100%;
    height:370px;
    position:relative;
    bottom:10px;
    overflow-y: scroll;
}
.mess p{
    margin-left:60px;
    font-size:15px;
    position:relative;
    top:20px;
}
.mobile-header{
    display:none;
 }
 @media screen and (max-width:767px){
    .mobile-header{
        display:block;
     }
    .header{
        display:none;
    }
    .box{
        width:480px;
        height:580px;
        position:relative;
        top:50px;
        right:180px;
        margin-top:10px;
    }
    .text .sub{
        width:230px;
        position:relative;
        bottom:12px;
    }
    .person{
        width:100px;
    }
    .person h3{
        font-size:15px;
        position:relative;
        left:15px;
        bottom:40px;
        padding:5px;
    }
    .person .return{
        font-size:15px;
        position:relative;
        left:15px;
        top:220px;
    }
    .contact{
        position:relative;
        right:25px;
    }
    hr{
        position:relative;
        left:8px;
        bottom:15px;
    }
    .text{
        position:relative;
        left:100px;
        bottom:595px;
        width:375px;
        border-radius:10px;
        height:70px;
    }
    .text .file,.send{
        position:relative;
        bottom:10px;
    }
    .mess p{
        right:60px;
    }
 }
        </style>
        <title>Html</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        
    </head>
    
    <body>
        <?php include 'header.php' ?>
        <div class="box">
            <div class="person">
                <input type="search" placeholder="Search for chats" class="search" ><i class="bi bi-search"></i>
                <div class="per">
                    <?php foreach($user as $users){ ?>
						<a href=""><h3><?php	print_r($users['u_name']) ?></h3></a>
						<?php }?>
               <a href="allchat.php" class="return">Return to chatroom</a></div>
            </div>
            <div class="chat">
                <div class="contact">
                    <h1><i class="bi bi-filetype-html"></i>        Html & Css        <i class="bi bi-filetype-css"></i></h1>
                </div><hr>
                <div class="mess">
                <?php foreach($message as $messages){ ?>
						<p><?php echo $messages['u_name']?>: <?php print_r($messages['m_message']) ?></p>
						<?php }?>
                </div>
            </div>
            <div class="text">
            <form method="POST">
                <input type="text" placeholder="Type text here ... " class="sub" name="m_message">
               
                    <button class="file"><i class="bi bi-paperclip"></i></button><button type="submit" class="send"><i class="bi bi-send"></i></button>
                </form>
            </div>
        </div>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    
    </script>
    </body>
</html>