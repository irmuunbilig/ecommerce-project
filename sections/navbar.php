<?php
// Ensure these variables are defined and populated somewhere in your project, such as a config file or directly in the script.
$store_phone = '+1235 2355 98';
$store_email = 'youremail@email.com';
$store_header_text = '3-5 BUSINESS DAYS DELIVERY & FREE RETURNS';
$site_title = 'Mongolian Shop';
?>

<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text"><?php echo $store_phone ?></span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text"><?php echo $store_email; ?></span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text"><?php echo $store_header_text; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/aiym/"><?php echo $site_title; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/aiym/" class="nav-link">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="/aiym/shop.php">Shop</a>
                        <a class="dropdown-item" href="/aiym/cart.php">Cart</a>
                    </div>
                </li>
                <li class="nav-item"><a href="/aiym/contact.php" class="nav-link">Contact</a></li>
                <li class="nav-item cta cta-colored"><a href="/aiym/cart.php" class="nav-link"><span class="icon-shopping_cart"></span><?php if ((isset($_SESSION['user']) && isset($_SESSION['user']['cart_items_count'])) && ($_SESSION['user']['cart_items_count'] > 0)) { echo $_SESSION['user']['cart_items_count']; } else { echo "0"; } ?></a></li>
                <?php if (isset($_SESSION['user'])) {
                    if ($_SESSION['user']['is_admin']) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="/aiym/auth/login.php"><?php echo $_SESSION['user']['name']; ?></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user']['name']; ?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="/aiym/client/">Account</a>
                                <a class="dropdown-item" href="/aiym/client/orders.php">My orders</a>
                                <a class="dropdown-item text-danger" href="/aiym/auth/logout.php">Logout</a>
                            </div>
                        </li>
                    <?php }
                } else { ?>
                    <li class="nav-item"><a href="/aiym/auth/login.php" class="nav-link">Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
