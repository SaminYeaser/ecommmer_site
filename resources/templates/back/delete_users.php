<?php require_once ("../../../resources/config.php");?>

<?php

if(isset($_GET['id'])){

    $delete_user = query("delete from users where user_id=".escape_string($_GET['id']));
    confirm($delete_user);

    set_message("User have been deleted!");
    redirect("http://localhost/ecom/public/admin/index.php?users");

}else{
    redirect("http://localhost/ecom/public/admin/index.php?users");
}

?>
