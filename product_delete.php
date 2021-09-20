<?php
    session_start();
    if(isset($_SESSION['userid']) && !empty($_SESSION['userid'])){

      if(isset($_GET['product_code']) && !empty($_GET['product_code'])){
            $product_code=$_GET['product_code'];
            try{

              $conn=new PDO("mysql:host=localhost:3306;dbname=e_agro_farming;", "root", "");
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $sqlquary="DELETE FROM Product WHERE product_code = $product_code";
              $conn->exec($sqlquary);

              ?>
              <script>location.assign("myProduct.php");</script>
              <?php
            }
            catch(PDOException $e){
                ?>
                    <script>location.assign("myProduct.php");</script>
                <?php
            }

            
        }
        else{
          ?>
          <script>location.assign("myProduct.php");</script>
          <?php
        }
    }
    else{
      ?>
      <script>location.assign("s_login.php");</script>
      <?php
    }
?>