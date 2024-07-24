<?php 
    require_once("../utils/session.php");
    require_once("../utils/isAdmin.php");

    // connect database
    require_once('../utils/db.php');
    
    // get total users
    $total_users = R::count('users');

    // get total order
    $total_orders = R::count('orders');

    // get recent orders
    $query = R::getAll("
        SELECT 
            P.name AS product_name, P.image AS product_image, U.name, U.surname, O.*
        FROM 
            products P, users U, orders O
        WHERE
            P.id = O.product_id AND U.id = O.user_id
        ORDER BY
            O.id
        DESC
        LIMIT
            10
    ");
    $orders = R::convertToBeans('orders', $query);

    // get total sales
    $total_sales = 0;
    foreach ($orders as $order) {
        $total_sales += $order->total;
    }
    
    $site_title = "Mongolian Shop";
?>
<!doctype html>
<html lang="en">
 
<head>
    <?php require("partials/head.php"); ?>
    <title>Dashboard | <?php echo $title; ?></title>
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
                                <h2 class="pageheader-title">Dashboard</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- sales  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Sales</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo $total_sales ?? '' ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end sales  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- new customer  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">New Customer</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo $total_users ?? '' ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end new customer  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            
                            <!-- ============================================================== -->
                            <!-- total orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Orders</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo $total_orders ?? '' ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end total orders  -->
                            <!-- ============================================================== -->
                        </div>                    


                        <div class="row">
                            <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Recent Orders</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Image</th>
                                                        <th class="border-0">Product Name</th>
                                                        <th class="border-0">Quantity</th>
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
                                                                    <td>
                                                                        <div class="m-r-10"><img src="../uploads/<?php echo $order->product_image ?? '' ?>" alt="user" class="rounded" width="45"></div>
                                                                    </td>
                                                                    <td><?php echo $order->product_name ?? '' ?></td>
                                                                    <td><?php echo $order->quantity ?? '' ?></td>
                                                                    <td><?php echo date('d.m.Y H:i', strtotime($order->created_at)) ?? '' ?></td>
                                                                    <td><?php echo $order->name." ".$order->surname ?? '' ?></td>
                                                                </tr>
                                                            <?php }
                                                        }
                                                    ?>
                                                    <tr>
                                                        <td colspan="9"><a href="/aiym/admin/orders.php" class="btn btn-outline-light float-right">All orders</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->
                        </div>

                        

                    </div>
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
