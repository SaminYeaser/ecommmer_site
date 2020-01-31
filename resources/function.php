<?php

//helper

function last_id(){
    global $connection;
    return mysqli_insert_id($connection);
}


    function set_message($msg){
        if(!empty($msg)){
            $_SESSION['message'] = $msg;
        }else{
            $msg ='';
        }
    }
    function get_message(){
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }

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
                                <a class="btn btn-primary" target="_blank" href="http://localhost/ecom/resources/cart.php?add={$row['product_id']}">Add to Cart</a>

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
    $query = "select * from products where product_catagory_id = ". escape_string($_GET['id']) ." ";
    $result = mysqli_query($connection,$query);
    confirm($result);

    while ($row = fetch_array($result)) {
        $product = <<<DELI

    <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['product_image']}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
                

DELI;
        echo $product;

    }
}



function get_products_in_shop(){
    global $connection;
    $query = "select * from products ";
    $result = mysqli_query($connection,$query);
    confirm($result);

    while ($row = fetch_array($result)) {
        $product = <<<DELI

    <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['product_image']}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
                

DELI;
        echo $product;

    }
}



function login_user(){

        if(isset($_POST['submit'])){
            $username = escape_string($_POST['username']);
            $password = escape_string($_POST['password']);

            $query = query("select * from users where user_name = '{$username}' and user_pass = '{$password}'");
            confirm($query);

            if(mysqli_num_rows($query)==0){

                set_message('Your password or username is wrong');
                redirect('login.php');
            }else{
                $_SESSION['user_name'] = $username;
                redirect('admin');
            }
        }
}


function display(){
    $query = query("select * from orders");
    confirm($query);

    while ($row = fetch_array($query)){
        $orders = <<<DELI

    <tr>
    <td>{$row['order_id']}</td>
    <td>{$row['order_amount']}</td>
    <td>{$row['order_transaction']}</td>
    <td>{$row['order_currency']}</td>
    <td>{$row['order_status']}</td>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_orders.php?id={$row['order_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>

DELI;
        echo  $orders;
    }
}


 ?>




<!--////////////////////////////////Admin Product functions-->
<!--//getProduct-->


<?php

function get_product_in_admin(){


    global $connection;
    $query = 'select * from products';
    $result = mysqli_query($connection,$query);
    confirm($result);

    while ($row = fetch_array($result)) {
      $cat_title = showing_title_name($row['product_catagory_id']);
        $product = <<<DELI

         <tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}<br>
            <a href="index.php?edit_product&id={$row['product_id']}"><img src="../../resources/uploads/{$row['product_image']}" alt=""></a>
            </td>
            <td>$cat_title</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_quantity']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
            <td><a href="index.php?edit_product&id={$row['product_id']}">Edit</a></td>
         </tr>
                

DELI;
        echo $product;

    }


}

?>

<!--adding prducts-->

<?php

function add_product(){
    if(isset($_POST['publish'])){
        $product_title = escape_string($_POST['product_title']);
        $product_description = escape_string($_POST['product_description']);
        $product_price = escape_string($_POST['product_price']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_quantity = escape_string($_POST['product_quantity']);
        $short_desc = escape_string($_POST['short_desc']);
        $product_image = escape_string($_FILES['file']['name']);
        $tmp_image = escape_string($_FILES['file']['tmp_name']);


        move_uploaded_file($tmp_image, IMAGE_DIRECTORY . SAM . $product_image);

        $query = query("insert into products(product_title,product_catagory_id,product_price,product_description,product_quantity,short_desc,product_image) values('{$product_title}','{$product_category_id}','{$product_price}','{$product_description}','{$product_quantity}','{$short_desc}','{$product_image}')");
        confirm($query);

        set_message('Product is Added');
        redirect('index.php?products');
    }
}


function show_category(){

    global $connection;

    $query = "SELECT * FROM catagories";
    $send_query = mysqli_query($connection, $query);

    if(!$send_query){
        die("Conncetion Failed". mysqli_error($connection));
    }

    while($row = mysqli_fetch_array($send_query)){
        echo "<option value=\"{$row['cat_id']}\">{$row['cat_title']}</option>";
    }

}

function showing_title_name($product_category_id){
    $query = query("select * from catagories where cat_id = '{$product_category_id}'");
    confirm($query);
    while ($row = fetch_array($query)){
        return $row['cat_title'];
    }
}


//updating prodcut


function edit_product(){
    global $connection;
    if(isset($_POST['update'])){
        $product_title = escape_string($_POST['product_title']);
        $product_description = escape_string($_POST['product_description']);
        $product_price = escape_string($_POST['product_price']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_quantity = escape_string($_POST['product_quantity']);
        $short_desc = escape_string($_POST['short_desc']);
        $product_image = escape_string($_FILES['file']['name']);
        $tmp_image = escape_string($_FILES['file']['tmp_name']);


        move_uploaded_file($tmp_image, IMAGE_DIRECTORY . SAM . $product_image);

        $query = "update products set ";
        $query .= "product_title = '{$product_title}',";
        $query .= "product_catagory_id = '{$product_category_id}',";
        $query .= "product_price = '{$product_price}',";
        $query .= "product_description = '{$product_description}',";
        $query .= "product_quantity = '{$product_quantity}',";
        $query .= "short_desc = '{$short_desc}',";
        $query .= "product_image = '{$product_image}'";
        $query .= "where product_id=". escape_string($_GET['id']);

        $query_work = mysqli_query($connection, $query) ;

        confirm($query_work);

        set_message('Product has been Updated');
        redirect('index.php?products');
    }
}


?>