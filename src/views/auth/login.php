<?php
    require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/src/controllers/user.controller.php");
    session_start();
    $userController = new UserController();
    if(isset($_POST['submit'])){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $check = $userController->login($email, $password);
        if($check) {
            $_SESSION['email'] = $email;
            header("Location: ../components/dashboard.php");
        }
        else echo "login failed";
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Đăng nhập</title>
</head>
<body>
    <form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email"  class="form-control" id="email" name="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="password">
            </div>
        </div>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>