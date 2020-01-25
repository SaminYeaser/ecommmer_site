<?php require_once("../resources/config.php"); ?>


<?php




if(isset($_GET['add'])){

    $query = query("select * from products where product_id=".escape_string($_GET['add'])." ");
    confirm($query);

    while ($row = fetch_array($query)){

        if($row['product_quantity']!=$_SESSION['product_'.$_GET['add']]){

            $_SESSION['product_'.$_GET['add']]+=1;
            redirect("http://localhost/ecom/public/checkout.php");

        }else{

            set_message(' We only have'.' '.$row['product_quantity'].' '.'available');
            redirect("http://localhost/ecom/public/checkout.php");

        }

    }

}

if(isset($_GET['remove'])){
    $_SESSION['product_'.$_GET['remove']]--;
    if($_SESSION['product_'.$_GET['remove']]<1){
        unset($_SESSION['total_item']);
        unset($_SESSION['total_item_price']);
        redirect("http://localhost/ecom/public/checkout.php");
    }else{
        redirect("http://localhost/ecom/public/checkout.php");
    }
}
if(isset($_GET['delete'])){
    $_SESSION['product_'. $_GET['delete']] = 0;
    unset($_SESSION['total_item']);
    unset($_SESSION['total_item_price']);
    redirect("http://localhost/ecom/public/checkout.php");
}


function cart()
{
    $total = 0;
    $total_item = 0;

    foreach ($_SESSION as $name => $value) {

        if($value>0){
            if (substr($name, 0, 8) == "product_") {
                $length = strlen($name);
                $id = substr($name, 8, $length);

                $query = query("select * from products where product_id = ". escape_string($id) ." ");
                confirm($query);

                while ($row = fetch_array($query)) {
                    $sub_total= $row['product_price'] * $value;
                    $total_item += $value;
                    $product = <<<DELI
            
            <tr>
                <td>{$row['product_title']}</td>
                <td>{$row['product_price']}</td>
                <td>{$value}</td>
                <td>{$sub_total}</td>
                <td><a class="btn btn-warning" href="http://localhost/ecom/resources/cart.php?remove={$row['product_id']}"><span class="glyohicon glyphicon-minus"></span></a> <a class="btn btn-primary" href="http://localhost/ecom/resources/cart.php?add={$row['product_id']}"><span class="glyphicon glyphicon-plus"></span></a> <a class="btn btn-danger" href="http://localhost/ecom/resources/cart.php?delete={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
                
              
            </tr>

DELI;


                    echo $product;
                     $_SESSION['total_item_price'] = $total += $sub_total;
                     $_SESSION['total_item'] = $total_item;
                }

            }
        }

}

}
?>