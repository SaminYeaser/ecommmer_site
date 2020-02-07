<?php require_once ('header.php')?>




        <div id="page-wrapper">

            <div class="container-fluid">

             <div class="row">

<h1 class="page-header">
   All Products

</h1>
                 <h2 class="text-center bg-danger"><?php get_message();?></h2>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Order ID</th>
           <th>Product Title</th>
           <th>Product Price</th>
           <th>Product Quantity</th>
           <th>Delete</th>
      </tr>
    </thead>
    <tbody>

<?php get_reports();?>
      


  </tbody>
</table>











                
                 


             </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->




<?php require_once ('footer.php')?>