



                    <div class="col-lg-12">
                      

                        <h1 class="page-header">
                            Users
                         
                        </h1>
                          <p class="bg-success">
<!--                            --><?php //echo $message; ?>
                        </p>

                        <a href="add_user.php" class="btn btn-primary">Add User</a>


                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>Email</th>


                                    </tr>
                                </thead>
                                <tbody>

<!--                                --><?php //foreach($users as $user): ?>

<?php show_users(); ?>


<!--                                --><?php //endforeach; ?>


                                    
                                    
                                </tbody>
                            </table> <!--End of Table-->
                        

                        </div>

                        
                    </div>
    



    <!-- /#wrapper -->
