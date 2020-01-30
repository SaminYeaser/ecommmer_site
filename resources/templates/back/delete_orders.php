<?php require_once ("../../../resources/config.php");?>

<?php

if(isset($_GET['id'])){

    $delete_order = query("delete from orders where order_id=".escape_string($_GET['id']));
    confirm($delete_order);

    set_message("Your order have been deleted!");
    redirect("http://localhost/ecom/public/admin/index.php?orders");

}else{
    redirect("http://localhost/ecom/public/admin/index.php?orders");
}

?>
