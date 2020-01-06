<?php require_once("../resources/config.php"); ?>


<?php include(TEMPLATE_FRONT . SAM ."header.php");?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

          <?php include(TEMPLATE_FRONT . SAM ."sideNav.php")?>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <!--courosel-->
                        <?php include(TEMPLATE_FRONT . SAM ."slider.php")?>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320*150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$74.99</h4>
                                <h4><a href="#">Third product</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>

                            </div>

                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Like this template?</a>
                        </h4>
                        <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                        <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                    </div>

                </div><!--ends here row-->
                <?php get_products();?>

            </div>

        </div>

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . SAM ."footer.php")?>
