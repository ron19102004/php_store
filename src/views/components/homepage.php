<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"] . "/src/controllers/product.controller.php"));
session_start();
$productController = new ProductController();
$page_current = empty($_SESSION["page_current"]) ? 1 : $_SESSION["page_current"];
$listProducts = $productController->findAll();
print_r($listProducts);
if (isset($_GET["find"])) {
    $text_find = htmlspecialchars($_GET["text_find"]);
    $_SESSION['page_current'] = $text_find;
    header("refresh: 2");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/homepage.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <title>Trang chủ</title>
</head>

<body>
    <header>
        <div class="brand">
            <img src="../assets/images/icons8-r-100.png" alt="logo">
            <h1>RON STORE</h1>
        </div>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
            <div class="search">
                <div class="group-input">
                    <input type="search" name="text_find" required>
                    <label for="text_find">Hãy nhập thứ bạn muốn tìm ... </label>
                </div>
                <button type="submit" name="find" value="has">
                    <img src="../assets/images/icons8-search-100.png" alt="find" width="20px">
                </button>
            </div>
        </form>
        <button class="cart">
            <img src="../assets/images/icons8-shopping-cart-100.png" alt="cart" width="45px">
        </button>
    </header>
    <main>
        <div class="side-bar">
            <div class="login-register">
                <?php 
                    if(isset($_SESSION['avatar_user'])) echo '<img src="'.$_SESSION['avatar_user'].'" alt="user" id="img_after_login">';
                    else echo '<img src="../assets/images/Custom-Icon-Design-Silky-Line-User-User.512.png" alt="user">'; 
                ?>
                <h3>
                    <?php 
                     if(isset($_SESSION['user_name'])) 
                        echo '<a href="">'.$_SESSION['user_name'].'</a>';
                     else echo 
                     '<a href="../auth/login.php">Đăng nhập</a>
                     /
                     <a href="">Đăng kí</a>';
                    ?>
                </h3>
            </div>
            <div class="function">
                <div class="group-item">
                    <div class="item">
                        <img src="../assets/images/icons8-male-user-100.png" alt="my-acc">
                        <a href="">Tài khoản của tôi</a>
                    </div>
                    <div class="item">
                        <img src="../assets/images/icons8-purchase-order-100.png" alt="order">
                        <a href="">Đơn mua</a>
                    </div>
                    <div class="item">
                        <img src="../assets/images/icons8-notification-100.png" alt="notify">
                        <a href="">Thông báo</a>
                    </div>
                    <div class="item">
                        <img src="../assets/images/icons8-communication-100.png" alt="ib">
                        <a href="">
                            Tin nhắn
                        </a>
                    </div>
                    <div class="item">
                        <img src="../assets/images/icons8-customer-support-100.png" alt="support">
                        <a href="">Hỗ trợ</a>
                    </div>
                    <?php
                    if(isset($_SESSION['email']))
                        echo 
                    '<div class="item">
                        <img src="../assets/images/icons8-open-pane-100.png" alt="logout">
                        <a href="../auth/logout.php">Đăng xuất</a>
                    </div>'
                    ?>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="products">
                <?php
                if (!empty($listProducts)) {
                    foreach ($listProducts as $product) {
                        $name_product ="";
                        $name = $product->name;
                        if(strlen($name) > 70) {
                            for($i=0;$i < 70;$i++) $name_product=$name_product.$name[$i];
                            $name_product=$name_product."...";
                        } else {
                            $none = 70 - strlen($name);
                            $name_product = $name;
                            for($i=0;$i < $none; $i++){
                                $name_product = $name_product."&nbsp";
                            }
                        };
                        echo '<div class="card">
                                    <img src="' . $product->url_img . '" class="card-img-top" alt="' . $product->url_img . '">
                                <div class="card-body">
                                    <h5 class="card-title">' .$name_product. '</h5>
                                    <a href="#" class="btn btn-primary">Giá:' . $product->price . '</a>
                                    <button class="btn btn-primary">Thêm giỏ hàng</button>
                                </div>
                             </div>';
                    };
                };
                ?>

            </div>
        </div>
        </div>
    </main>
    <?php include("./footer.php"); ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script>
    const load_page=()=>{
        location.reload();
    }
</script>
</html>