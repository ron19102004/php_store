<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . "/src/controllers/user.controller.php");
session_start();
$userController = new UserController();
if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $check = $userController->login($email, $password);
    if ($check) {
        $_SESSION['email'] = $email;
        header("Location: ../components/dashboard.php");
    } else echo "login failed";
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Đăng nhập - Ron Store</title>
</head>
<body>
    <header>
        <div class="container text-center" id="container">
            <div class="row">
                <div class="col" id="brand">
                    <img src="../assets/images/icons8-r-100.png" alt="logo" width="80">
                    <h1>RON STORE</h1>
                </div>
                <div class="col" id="help">
                    <h6><a href="">Bạn cần giúp đỡ ?</a></h6>
                </div>
            </div>
        </div>
    </header>
    <main>
        <img src="../assets/images/Ellipse 1.png" alt="elp1" id="pic1">
        <img src="../assets/images/Ellipse 2.png" alt="elp2" id="pic2">
        <img src="../assets/images/Ellipse 4.png" alt="elp4" id="pic3">
        <img src="../assets/images/Ellipse 3.png" alt="elp3" id="pic4">
        <img src="../assets/images/Group 15.png" alt="gr15" id="pic5">
        <img src="../assets/images/Ellipse 7.png" alt="elp3" id="pic6">
        <div class="form-login">
            <h1>Đăng Nhập</h1>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <div class="group-input" id="input-email">
                    <input type="email" name="email" id="email" required>
                    <label for="email">&nbspNhập email</label>
                </div>
                <div class="group-input" id="input-password">
                    <input type="password" name="password" id="password" required>
                    <label for="password">Nhập mật khẩu</label>
                </div>
                <div class="submit">
                    <input type="submit" value="Đăng nhập" name="submit">
                </div>
            </form>
            <hr/>
            <p>
                <a href="">Quên mật khẩu&nbsp&nbsp</a>
                |
                <a href="">&nbsp&nbsp&nbspĐăng kí</a>
            </p>
        </div>
    </main>
    <footer>
        <div class="footer-brand">
            <div class="contact">
                <h5>Liên hệ : </h5>
                <a href=""><img src="../assets/images/icons8-facebook-100 (5).png" alt="fb"></a>
                <a href=""><img src="../assets/images/icons8-instagram-100 (1).png" alt="ig"></a>
                <a href=""><img src="../assets/images/icons8-mail-100 (1).png" alt="e"></a>
            </div>
            <h5>© Copyright - Designed By Ron</h5>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>