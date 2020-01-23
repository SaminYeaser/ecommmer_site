<?php require_once("../../resources/config.php")?>
<?php require_once("../../resources/templates/back/header.php")?>

<?php

if(!isset($_SESSION['user_name'])){
    header('Location: http://localhost/ecom/public/');
}



?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


            <?php

                if($_SERVER['REQUEST_URI'] === "/ecom/public/admin/" || $_SERVER['REQUEST_URI'] === "/ecom/public/admin/index.php" ){
                    require_once("../../resources/templates/back/admin_content.php");
                }
                if(isset($_GET['orders'])){
                    require_once("../../resources/templates/back/orders.php");
                }
            if(isset($_GET['categories'])){
                require_once("../../resources/templates/back/categories.php");
            }
            if(isset($_GET['products'])){
                require_once("../../resources/templates/back/products.php");
            }
            if(isset($_GET['add_product'])){
                require_once("../../resources/templates/back/add_product.php");
            }

            ?>



<!--                --><?php //require_once("../../resources/templates/back/admin_content.php")?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php require_once("../../resources/templates/back/footer.php")?>
    <!-- jQuery -->
