<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: ../auth/login.php");
    }
    if (isset($_POST['logout'])){
        header("Location: ../auth/logout.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
</head>
<body>
    <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
        <input type="submit" value="Logout" name="logout">
    </form>
</body>
</html>