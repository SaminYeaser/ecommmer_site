<?php require_once ("../../../resources/config.php");?>

<?php

if(isset($_GET['id'])){

    $delete_category = query("delete from catagories where cat_id=".escape_string($_GET['id']));
    confirm($delete_category);

    set_message("Category have been deleted!");
    redirect("http://localhost/ecom/public/admin/index.php?categories");

}else{
    redirect("http://localhost/ecom/public/admin/index.php?categories");
}

?>
