<div class="col-md-3">
    <p class="lead">Shop Name</p>
    <div class="list-group">

      <?php

          $query = "SELECT * FROM catagories";
          $send_query = mysqli_query($connection, $query);

          if(!$send_query){
            die("Conncetion Failed". mysqli_error($connection));
          }

          while($row = mysqli_fetch_array($send_query)){
            echo "<a href='' class='list-group-item'>{$row['cat_title']}</a>";
          }

      ?>

        <!-- <a href="category.html" class="list-group-item">Category 1</a>
        <a href="#" class="list-group-item">Category 2</a>
        <a href="#" class="list-group-item">Category 3</a> -->
    </div>
</div>
