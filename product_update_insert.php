<?php
    session_start();
    if(isset($_SESSION['userid']) && !empty($_SESSION['userid'])){
    

      if( 
          isset($_POST['product_code']) &&
          isset($_POST['product_name']) &&
          isset($_POST['product_availablity']) &&
          isset($_POST['product_quantity']) &&
          isset($_POST['unit']) &&
          isset($_POST['product_type']) &&
          isset($_POST['product_price']) &&
          !empty($_POST['product_code']) &&
          !empty($_POST['product_name']) &&
          !empty($_POST['product_availablity']) &&
          !empty($_POST['product_quantity']) &&
          !empty($_POST['unit']) &&
          !empty($_POST['product_type']) &&
          !empty($_POST['product_price'])
        ){
            $product_code=$_POST['product_code'];
            $product_name=$_POST['product_name'];
            $product_availablity=$_POST['product_availablity'];
            $product_quantity=$_POST['product_quantity'];
            $unit=$_POST['unit'];
            $product_type=$_POST['product_type'];
            $product_price=$_POST['product_price'];
           

            try{

              $conn=new PDO("mysql:host=localhost:3306;dbname=e_agro_farming;", "root", "");
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              

              $sqlquary="SELECT* FROM product WHERE product_code = $product_code";
              $pdo_obj=$conn->query($sqlquary);
              $table_data=$pdo_obj->fetchAll();

            //   if($pdo_obj->rowCount() == 0){
            //     $availablequantity = $product_quantity;
            //   }
            //   else{
            //     foreach ($table_data as $row) {
            //       $availablequantity = $product_quantity - $row['product_quantity'];
            //     }
            //   }

            echo $product_quantity;

              $sqlquary="UPDATE product SET product_name = '$product_name', product_availablity = '$product_availablity' , product_quantity = $product_quantity , unit = '$unit' , Product_type = '$product_type', product_price = $product_price WHERE product_code = $product_code";
              $conn->exec($sqlquary);
              

              ?>
              <script>location.assign("myProduct.php");</script>
              <?php
            }
            catch(PDOException $e){
                ?>
                    <tr>
                        <td colspan="6">No values found</td>
                    <tr>
                <?php
            }
        }
        else{
          ?>
          <script>location.assign("product_update.php");</script>
          <?php
        }
    }
    else{
      ?>
      <script>location.assign("s_login.php");</script>
      <?php
    }
?>