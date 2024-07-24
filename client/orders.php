<?php
    require_once("../utils/session.php");
    require_once("../utils/isAuthed.php");
    // Set the title of the page
    $title = "Mongolian Shop - Home";

    // connect to database
    require_once('../utils/db.php');

    // Enable error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Check if the user session is set
    if (!isset($_SESSION['user']['id'])) {
        echo "User session not set";
        exit;
    }

    // get user orders
    $query = R::getAll('
        SELECT 
            P.name AS product_name, O.*
        FROM 
            products P, orders O
        WHERE 
            P.id = O.product_id
        AND
            O.user_id = ? 
        ORDER BY
            O.id DESC
    ', [$_SESSION['user']['id']]);

    // Check if query returned any results
    if (!$query) {
        echo "No orders found";
        exit;
    }

    $orders = R::convertToBeans('orders', $query); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require("../sections/head.php"); ?>
    <title>My orders | <?php echo $title; ?></title>

    <style>
        .table {
            min-width: 90% !important;
            max-width: 95% !important;
        }

        .table tbody tr td {
            padding: 0.75rem !important;
        }
    </style>
</head>

<body>
    <?php require("../sections/navbar.php"); ?>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/aiym/client/index.php">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/aiym/client/orders.php">My orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="/aiym/auth/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <h1>My orders</h1>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Payment type</th>
                                    <th scope="col">Ordered at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($orders) {
                                        foreach ($orders as $order) {?>
                                            <tr>
                                                <th scope="row"><?php echo $order->id ?? '' ?></th>
                                                <td><?php echo $order->product_name ?? '' ?></td>
                                                <td><?php echo $order->quantity ?? '' ?></td>
                                                <td><?php echo $order->total ?? '' ?></td>
                                                <td><?php echo $order->payment_type ?? '' ?></td>
                                                <td><?php echo date('d.m.Y H:i', strtotime($order->created_at)) ?? '' ?></td>
                                            </tr>
                                        <?php }
                                    } else {
                                        echo "<tr><td colspan='6'>No orders found</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require("../sections/footer.php"); ?>

    <!-- JS Files -->
    <script src="/aiym/assets/js/jquery.min.js"></script>
    <script src="/aiym/assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/aiym/assets/js/popper.min.js"></script>
    <script src="/aiym/assets/js/bootstrap.min.js"></script>
    <script src="/aiym/assets/js/jquery.easing.1.3.js"></script>
    <script src="/aiym/assets/js/jquery.waypoints.min.js"></script>
    <script src="/aiym/assets/js/jquery.stellar.min.js"></script>
    <script src="/aiym/assets/js/owl.carousel.min.js"></script>
    <script src="/aiym/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/aiym/assets/js/aos.js"></script>
    <script src="/aiym/assets/js/jquery.animateNumber.min.js"></script>
    <script src="/aiym/assets/js/bootstrap-datepicker.js"></script>
    <script src="/aiym/assets/js/scrollax.min.js"></script>
    <script src="/aiym/assets/js/google-map.js"></script>
    <script src="/aiym/assets/js/jquery.inputmask.min.js"></script>
    <script src="/aiym/assets/js/inputmask.binding.js"></script>
    <script src="/aiym/assets/js/main.js"></script>
</body>

</html>
