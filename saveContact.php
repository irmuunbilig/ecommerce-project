<?php 
    session_start();

    // connect database
    require_once('utils/db.php');

    $contact = R::dispense('contacts');
    $contact->name = $_POST['name'];
    $contact->email = $_POST['email'];
    $contact->subject = $_POST['subject'];
    $contact->message = $_POST['message'];

    // save contact
    if(R::store($contact)) {
        $_SESSION['messages'][] = 'Thank you!';
    } else {
        $_SESSION['errors'][] = 'Something went wrong';
    }

    header('Location: /aiym/contact.php');
    die();
?>