<?php 
    require_once("../utils/session.php");
    require_once("../utils/isAdmin.php");

    // connect database
    require_once('../utils/db.php');

    // get orders
    $query = R::getAll("
        SELECT 
            P.name AS product_name, P.image AS product_image, P.price AS product_price,  U.name , U.surname, O.*
        FROM 
            products P, users U, orders O
        WHERE
            P.id = O.product_id AND U.id = O.user_id 
        ORDER BY
            O.id
        DESC
    ");
    $orders = R::convertToBeans('orders', $query);
    $site_title = "Mongolian Shop";
?>
<!doctype html>
<html lang="en">
 
<head>
    <?php require("partials/head.php"); ?>
    <title>Orders | <?php echo $title; ?></title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        
        <?php require_once("partials/navbar.php") ?>

        <?php require_once('partials/sidebar.php') ?>

        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Orders</h2>
                            </div>

                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">#</th>
                                                    <th class="border-0">Product Name</th>
                                                    <th class="border-0">Quantity</th>
                                                    <th class="border-0">Payment type</th>
                                                    <th class="border-0">Total</th>
                                                    <th class="border-0">Order Time</th>
                                                    <th class="border-0">Customer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if($orders) {
                                                        foreach ($orders as $order) { ?>
                                                            <tr>
                                                                <td><?php echo $order->id ?? '' ?></td>
                                                                <td><?php echo $order->product_name ?? '' ?></td>
                                                                <td><?php echo $order->quantity ?? '' ?></td>
                                                                <td><?php echo $order->payment_type ?? '' ?></td>
                                                                <td><?php echo intval($order->quantity)*floatval($order->product_price)  ?? '' ?></td>
                                                                <td><?php echo date('d.m.Y H:i', strtotime($order->created_at)) ?? '' ?></td>
                                                                <td><?php echo $order->name." ".$order->surname ?? '' ?></td>
                                                            </tr>
                                                        <?php }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                </div>
            </div>
            
            <?php require_once('partials/copyright.php') ?>

        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    
    <?php require_once("partials/footer.php") ?>
</body>
 
</html>
