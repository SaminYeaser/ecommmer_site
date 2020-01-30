<?php require_once("../../resources/config.php")?>
<?php require_once("../../resources/templates/back/header.php")?>



        <div id="page-wrapper">

            <div class="container-fluid">


                


        <div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>id</th>
           <th>Amount</th>
           <th>Transaction</th>
           <th>Currency</th>
           <th>Status</th>

      </tr>
    </thead>
    <tbody>
    <?php display(); ?>


    </tbody>
</table>
</div>











            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php require_once("../../resources/templates/back/footer.php")?>