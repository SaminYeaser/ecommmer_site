<?php require_once("../resources/config.php"); ?>


<?php include(TEMPLATE_FRONT . SAM ."header.php");?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header>
            <h1>Shop</h1>
        </header>

        <hr>



        <!-- Page Features -->
        <div class="row text-center">


<?php get_products_in_shop();?>


        </div>
        <!-- /.row -->



    </div>


<?php include(TEMPLATE_FRONT . SAM ."footer.php");?>


</body>

</html>
