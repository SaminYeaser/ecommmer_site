<?php require_once ("../../../resources/config.php");?>

<?php

if(isset($_GET['id'])){

    $report_product = query("delete from reports where report_id=".escape_string($_GET['id']));
    confirm($report_product);

    set_message("Report have been deleted!");
    redirect("http://localhost/ecom/public/admin/index.php?reports");

}else{
    redirect("http://localhost/ecom/public/admin/index.php?reports");
}

?>
