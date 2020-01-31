<?php require_once ("../../../resources/config.php");?>

<?php

if(isset($_GET['id'])){

    $delete_product = query("delete from products where product_id=".escape_string($_GET['id']));
    confirm($delete_product);

    set_message("Product have been deleted!");
    redirect("http://localhost/ecom/public/admin/index.php?products");

}else{
    redirect("http://localhost/ecom/public/admin/index.php?products");
}

?>
