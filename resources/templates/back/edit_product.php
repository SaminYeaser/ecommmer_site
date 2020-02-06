




<?php

if(isset($_GET['id'])){
    $query = query("select * from products where product_id=".escape_string($_GET['id']));
    confirm($query);

    while ($row = fetch_array($query)){
        $product_title =  $row['product_title'];
        $product_category_id = $row['product_catagory_id'];
        $product_price = $row['product_price'];
        $product_description = $row['product_description'];
        $product_quantity = $row['product_quantity'];
        $short_desc = $row['short_desc'];
        $product_image = $row['product_image'];
        $short_desc = $row['short_desc'];
    }
edit_product();
}


?>




<div class="col-md-12">

    <div class="row">
        <h1 class="page-header">
            Edit Product

        </h1>
    </div>



    <form action="" method="post" enctype="multipart/form-data">


        <div class="col-md-8">

            <div class="form-group">
                <label for="product-title">Product Title </label>
                <input type="text" name="product_title" class="form-control" value="<?php echo $product_title?>">

            </div>


            <div class="form-group">
                <label for="product-title">Product Description</label>
                <textarea name="product_description" id="" cols="30" rows="10" class="form-control" value=""><?php echo $product_description?></textarea>
            </div>



            <div class="form-group row">

                <div class="col-xs-3">
                    <label for="product-price">Product Price</label>
                    <input type="text" value="<?php echo $product_price?>" name="product_price" class="form-control" size="60">
                </div>
            </div>

            <div class="form-group">
                <label for="product-title">Product Short Description</label>
                <textarea value="" name="short_desc" id="" cols="30" rows="3" class="form-control"><?php echo $short_desc?></textarea>
            </div>





        </div><!--Main Content-->


        <!-- SIDEBAR-->


        <aside id="admin_sidebar" class="col-md-4">


            <div class="form-group">
                <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
                <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">

            </div>


            <!-- Product Categories-->

            <div class="form-group">
                <label for="product-title">Product Category</label>

                <select name="product_category_id" id="" class="form-control">
                    <option value="<?php echo $product_category_id?>"><?php echo showing_title_name($product_category_id)?></option>
                    <?php show_category();?>
                </select>


            </div>





            <!-- Product Brands-->


            <div class="form-group">
                <label for="product-title">Product Quantity</label>
                <input type="number" name="product_quantity" class="form-control" value="<?php echo $product_quantity?>">
            </div>


            <!-- Product Tags -->


            <!--    <div class="form-group">-->
            <!--          <label for="product-title">Product Keywords</label>-->
            <!--          <hr>-->
            <!--        <input type="text" name="product_tags" class="form-control">-->
            <!--    </div>-->

            <!-- Product Image -->
            <div class="form-group">
                <label for="product-title">Product Image</label>
                <input type="file" name="file" value="<?php echo $product_image?>">

            </div>



        </aside><!--SIDEBAR-->



    </form>







</div>
<!-- /.container-fluid -->
