<?php require_once("../resources/config.php"); ?>


<?php include(TEMPLATE_FRONT . SAM ."header.php");?>



    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>
          <h2><?php get_message();?></h2>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">
                <div class="form-group"><label for="">
                    username<input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="text" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>  


    </header>
        <?php login_user();?>

        </div>



<?php include(TEMPLATE_FRONT . SAM ."footer.php");?>


</body>

</html>
