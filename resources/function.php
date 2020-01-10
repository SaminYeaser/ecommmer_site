<?php

//helper

    function redirect($location){

      header("location: $location");

    }
    function query($sql){
        global $connection;
     return mysqli_query($connection , $sql);
    }

    function confirm($result){

      global $connection;
      if(!$result){
        die("Query Failed!". mysqli_error($connection));
      }
    }

    function escape_string($string){

        global $connection;
        return mysqli_real_escape_string($connection, $string);
    }

    function fetch_array($result){

      return mysqli_fetch_array($result);
    }


function get_products(){
        global $connection;
        $query = 'select * from products';
    $result = mysqli_query($connection,$query);
    confirm($result);

    while ($row = fetch_array($result)) {
      $product = <<<DELI

    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                <a class="btn btn-primary" target="_blank" href="item.php?id={$row['product_id']}">Add to Cart</a>

                            </div>

                        </div>
                    </div>
                

DELI;
      echo $product;

    }
}

function get_category(){

        global $connection;

    $query = "SELECT * FROM catagories";
    $send_query = mysqli_query($connection, $query);

    if(!$send_query){
        die("Conncetion Failed". mysqli_error($connection));
    }

    while($row = mysqli_fetch_array($send_query)){
        echo "<a href='category.php?id={$row["cat_id"]}' class='list-group-item'>{$row['cat_title']}</a>";
    }

}





function get_products_with_cat_id(){
    global $connection;
    $query = "select * from products where product_category_id = ". escape_string($_GET['id']) ." ";
    $result = mysqli_query($connection,$query);
    confirm($result);

    while ($row = fetch_array($result)) {
        $product = <<<DELI

    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                <a class="btn btn-primary" target="_blank" href="item.php?id={$row['product_id']}">Add to Cart</a>

                            </div>

                        </div>
                    </div>
                

DELI;
        echo $product;

    }
}
//getProduct

  // function get_products(){
  //   $query = query("SELECT * FROM products");
  //   //confirm($query);
  //   while($row = fetch_array($query)){
  //     $product = <<<DELIMETER
  //     <div class="col-sm-4 col-lg-4 col-md-4">
  //         <div class="thumbnail">
  //             <img src="http://placehold.it/320x150" alt="">
  //             <div class="caption">
  //                 <h4 class="pull-right">$24.99</h4>
  //                 <h4><a href="product.html">First Product</a>
  //                 </h4>
  //                 <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
  //                   <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
  //             </div>
  //
  //         </div>
  //     </div>
  //
  //     DELIMETER;
  //   }
  // }

 ?>
