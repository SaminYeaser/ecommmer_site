<?php

//helper

    function redirect($location){

      header("location: $location");

    }
    function query($sql){
        global $connection;
      mysqli_query($connection , $sql);
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
                            <img src="http://placehold.it/320*150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$74.99</h4>
                                <h4><a href="#">Third product</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>

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
