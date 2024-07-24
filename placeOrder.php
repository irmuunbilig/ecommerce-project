<?php 
    session_start();

    require_once("utils/isAuthed.php");

    // connect to database
    require_once('utils/db.php');

    // create new order
    foreach ($_SESSION['cart']['products'] as $product_id => $quantity) {
        $product = R::findOne('products', 'id = ?', [$product_id]);

        $order = R::dispense('orders');
        $order->user_id = $_SESSION['user']['id'];
        $order->product_id  = $product->id;
        $order->quantity = $quantity;
        $order->total = intval($quantity) * floatval($product->price);
        $order->payment_type = $_POST['payment_type'];

        if(R::store($order)) {
            $_SESSION['messages'][] = 'Thank you';
        } else {
            $_SESSION['errors'][] = 'Something went wrong';
        }
    }

    // Use absolute path for redirection
    header('Location: /aiym/client/orders.php');
    die();
?>
