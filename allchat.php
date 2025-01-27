<?php

session_start();
$u_id = $_SESSION['u_id'];
include 'connect.php';  // Ensure this file correctly sets up $conn
// die('test');
$select_sql1 = 'SELECT * FROM chatroom';
$result1 = mysqli_query($conn, $select_sql1);

if (!$result1) {
    die("Error executing query for chatroom: " . mysqli_error($conn));
}
$select_sql2 = "SELECT*FROM user WHERE u_id='$u_id'";
$result2 = mysqli_query($conn, $select_sql2);

if (!$result2) {
    die("Error executing query for users: " . mysqli_error($conn));
}

$chatrooms = mysqli_fetch_all($result1, MYSQLI_ASSOC);
$users = mysqli_fetch_all($result2, MYSQLI_ASSOC);
$id = 1;

include 'connect.php';
$search = isset($_POST['search']) ? $_POST['search'] : '';
if ($search) {
    $select_sql = "SELECT * FROM chatroom WHERE ch_name LIKE '%" . mysqli_real_escape_string($conn, $search) . "%'";
} else {
    $select_sql = 'SELECT * FROM chatroom';
}
$result = mysqli_query($conn, $select_sql);
$chatrooms = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A platform to explore and join chatrooms for seamless communication.">
    <meta name="keywords" content="chatrooms, groups, communication, social, connect">
    <meta name="author" content="Your Name or Organization">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#007bff">
    <title>All Groups</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">
    <style>
        body {
            background-color: #eef0f2 !important;
        }

        .container {
            border-radius: 10px;
        }

        .group-card {
            background-color: #fff;
            border-radius: 20px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 15px;
            margin-top: 10px;
        }



        .group-card img {
            border-radius: 15px;
            width: 100%;
            height: 123px;
            object-fit: cover;
        }

        .btn-join {
            margin-top: 10px;
            width: 100%;
        }

        .btn-join:hover {

            color: #000;
        }

        .group-card a {
            text-decoration: none;
            color: #000;
            padding-right: 20px;
        }

        .groups {
            background-color: #fff;
            border-radius: 20px;
            margin-top: 79px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }



        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, system-ui, sans-serif;
        }


        .main-content {
            padding: 80px 20px 20px;
        }

        .profile-card {
            width: 300px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .cover-photo {
            height: 120px;
            background-image: linear-gradient(to right, #2c3e50, #3498db);
        }

        .profile-info {
            text-align: center;
            padding: 0 20px 20px;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 4px solid #fff;
            background: rgb(255, 255, 255);
            margin: -40px auto 10px;
        }

        .profile-avatar img {
            width: 70px;
            border-radius: 50%;
            margin: 1px;
            height: 70px;
            object-fit: cover;
        }

        .groups h2 {
            margin-top: 10px;
        }

        .profile-name {
            font-size: 20px;
            font-weight: 700;
            margin: 10px 0 5px;
            color: #1c1e21;
        }

        .profile-title {
            font-size: 14px;
            color: #65676b;
            margin-bottom: 15px;
        }

        .profile-bio {
            font-size: 14px;
            color: #65676b;
            margin-bottom: 15px;
            padding: 0 10px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: #050505;
            text-decoration: none;
            font-size: 14px;
            transition: .2s;
        }

        .menu-item:hover {
            background: #f2f2f2;
        }

        .view-profile {
            text-align: center;
            padding: 15px 0;
            border-top: 1px solid #e4e6eb;
        }

        .view-profile a {
            color: #1877f2;
            text-decoration: none;
            font-size: 14px;
        }

        .main-content {
            
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, system-ui, sans-serif;
        }



        .search-bar {
            padding: 12px 15px 12px 40px;
            border: 1px solid #e4e6eb;
            background: #fff;
            border-radius: 6px;
            width: 260px;
            font-size: 14px;
            transition: .2s;
        }

        .search-bar:focus {
            outline: none;
            border-color: #1877f2;
            box-shadow: 0 0 0 2px #1877f233;
        }



        .search-icon svg {
            fill: #666;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-items {
            display: flex;
            gap: 32px;
        }

        .header-item {
            color: #050505;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 6px;
            transition: .2s;
        }

        .header-item:hover {
            background: #f2f3f5;
        }

        .action-items {
            display: flex;
            gap: 16px;
        }

        .action-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f2f5;
            cursor: pointer;
            transition: .2s;
        }

        .action-icon:hover {
            background: #e4e6eb;
        }

        .search-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, color 0.3s ease, border 0.3s ease, box-shadow 0.3s ease;
        }

        .search-button:hover {
            background-color: transparent;
            color: #007bff;
            border: 2px solid #007bff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .mobile-header {
            display: none;
        }

        @media only screen and (max-width: 767px) {
            .mobile-header {
                display: block;
            }

            .header {
                display: none;
            }

            body {
                background-color: rgb(0, 0, 0) !important;
            }

            .container {
                border-radius: 10px;
            }

            .group-card {
                background-color: #fff;
                border-radius: 20px;
                padding: 15px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                text-align: center;
                margin-bottom: 15px;
                margin-top: 10px;
            }

            .group-card img {
                border-radius: 15px;
                width: 100%;
                height: 150px;
                object-fit: contain;
            }

            .btn-join {
                margin-top: 10px;
                width: 100%;
            }

            .btn-join:hover {

                color: #000;
            }

            a {
                text-decoration: none;
                color: #000;
                padding-right: 20px;
            }

            a:hover {
                color: blue;
            }

            .groups {
                background-color: #fff;
                border-radius: 20px;
                margin-top: 5px;
                width: 382px;
                margin-left: 16px;
            }



            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: -apple-system, system-ui, sans-serif;
            }

            .profile-card {
                width: 380px;
                background: #fff;
                border-radius: 8px;
                box-shadow: 0 1px 3px #0001;
                overflow: hidden;

            }

            .cover-photo {
                height: 100px;
                background-image: linear-gradient(to right, #2c3e50, #3498db);
            }

            .profile-info {
                text-align: center;

            }

            .profile-avatar {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                border: 4px solid #fff;
                background: rgb(255, 255, 255);
                margin: -40px auto 10px;
            }

            .profile-avatar img {
                width: 70px;
                border-radius: 50%;
                margin: 1px;
                height: 70px;
                object-fit: cover;
            }

            .profile-name {
                font-size: 20px;
                font-weight: 700;
                margin: ;
                color: #1c1e21;
            }

            .profile-title {
                font-size: 14px;
                color: #65676b;
                margin-bottom: -20px;
            }

            .profile-bio {
                font-size: 14px;
                color: #65676b;
                margin-bottom: 15px;
                padding: 0 10px;
            }

            .menu-item {
                display: flex;
                align-items: center;
                padding: 10px 20px;
                color: #050505;
                text-decoration: none;
                font-size: 14px;
                transition: .2s;
            }

            .menu-item:hover {
                background: #f2f2f2;
            }

            .view-profile {
                text-align: center;
                padding: 5px 0;
                border-top: 1px solid #e4e6eb;
            }

            .view-profile a {
                color: #1877f2;
                text-decoration: none;
                font-size: 14px;
            }

            .main-content {
                margin-left: -14px;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: -apple-system, system-ui, sans-serif;
            }



            .profile-avatar img {
                width: 71px;
                border-radius: 50%;
                margin-left: 1px;
            }

            .groups h2 {
                margin-top: 10px;

            }
        }
    </style>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <?php foreach ($users as $user) { ?>
                    <div class="main-content">
                        <div class="profile-card">
                            <div class="cover-photo"
                                style="background-image: https://media.discordapp.net/attachments/1324997509675880458/1328982751512100916/ocean-waves.jpg?ex=6788af23&is=67875da3&hm=63a70dc8f8eb4051d93331b20eef39f49376d97770d05b743a2e88cb2c856f94&=&format=webp&width=964&height=631;">
                            </div>
                            <div class="profile-info">
                                <div class="profile-avatar"><img src="<?= $user['u_logo'] ?>" alt=""></div>
                                <h1 class="profile-name"><?php echo $user['u_name']; ?></h1>
                                <div class="profile-title"><?php echo $user['u_role']; ?></div>

                            </div>
                            <div class="menu-list">
                                <a href="index.php" class="menu-item">🏠 Home</a>
                            </div>
                            <div class="view-profile">
                                <a href="profile.php">View Profile</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="col-md-8 groups">

                <h2>Groups</h2>
                <div class="search-container">

                    <form method="POST" action="allchat.php">
                        <input type="text" class="search-bar" placeholder="Search..." name="search">
                        <button type="submit" class="search-button">search</button>
                    </form>
                </div>
                <div class="row g-3">
                    <?php foreach ($chatrooms as $chatroom) { ?>
                        <div class="col-md-4">
                            <div class="group-card">
                                <img src="<?= $chatroom['img_url']; ?>">
                                <h5><?= htmlspecialchars($chatroom['ch_name']); ?></h5>
                                <a href="chat.php?chatId=<?= $chatroom['ch_id']; ?>"><button
                                        class="btn btn-success btn-join">Chat</button></a>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>