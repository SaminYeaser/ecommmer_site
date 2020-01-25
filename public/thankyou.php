<?php
require_once("../resources/config.php");
include ("../../resources/templates/back/header.php");

?>

<?php

if(isset($_GET['tx'])){
    $amount = $_GET['amt'];
    $currency = $_GET['cc'];
    $transaction = $_GET['tx'];
    $status = $_GET['st'];

    $query = query("insert into orders(order_amount, order_transaction,order_status,order_currency) values('{$amount}','{$transaction}','{$status}','{$currency}')");
    confirm($query);


    report();


    //session_destroy();

}

?>
