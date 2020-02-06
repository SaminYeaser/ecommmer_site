<?php //require_once ('header.php')?>





            

<h1 class="page-header">
  Product Categories

</h1>

<!--<h1 class="bg-danger text-center">--><?php //get_message();?><!--</h1>-->
<div class="col-md-4">

    <?php add_category(); ?>
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input name="cat_title" type="text" class="form-control">
        </div>

        <div class="form-group">
            
            <input name="Add_Category" type="submit" class="btn btn-primary" value="Add Category">
        </div>      


    </form>


</div>


<div class="col-md-8">
<h1 class="bg-danger text-center"><?php get_message();?></h1>
    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Delete</th>
        </tr>
            </thead>


    <tbody>
        <tr>
            <?php show_categories();?>
        </tr>
    </tbody>

        </table>

</div>






<?php //require_once ('footer.php')?>









