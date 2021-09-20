<?php
    session_start();
    if(isset($_SESSION['userid']) && !empty($_SESSION['userid'])){
    
        $userid=$_SESSION['userid'];

      if( 
          isset($_POST['product_name']) &&
          isset($_FILES['product_image']) &&
          isset($_POST['product_availablity']) &&
          isset($_POST['product_quantity']) &&
          isset($_POST['product_price']) &&
          isset($_POST['unit']) &&
          isset($_POST['product_type']) &&

          
          !empty($_POST['product_name']) &&
          !empty($_FILES['product_image']) &&
          !empty($_POST['product_availablity']) &&
          !empty($_POST['product_quantity']) &&
          !empty($_POST['product_price']) &&
          !empty($_POST['unit']) &&
          !empty($_POST['product_type'])
        ){
           
            $product_name=$_POST['product_name'];
            $product_image=$_FILES['product_image'];
            $product_availablity=$_POST['product_availablity'];
            $product_quantity=$_POST['product_quantity'];
            $product_price=$_POST['product_price'];
            $unit=$_POST['unit'];
            $product_type=$_POST['product_type'];
         

            $img_name=$product_image['name'];

            echo $img_name;
            // $img_tmp_path=$product_image['tmp_name'];
            // echo $img_tmp_path;
            // $img_dst_path="product_image/$img_name";
            // echo $img_dst_path;

            // move_uploaded_file($img_tmp_path,$img_dst_path);
            try{

                $conn=new PDO("mysql:host=localhost:3306;dbname=e_agro_farming;", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
                $sqlquary="INSERT INTO product VALUES(NULL, '$product_name', '$product_type', '$product_availablity', $product_price, NULL , 'productimage/$img_name',NULL, $userid, $product_quantity , '$unit' )";
                $conn->exec($sqlquary);
  
                ?>
                <script>alert("Product Added");
                location.assign("myProduct.php");</script>
                <?php
              }
              catch(PDOException $e){
                  ?>
                    <script>location.assign("product_entry.php");</script>  
                  <?php
              }
          }
          else{
            ?>
            <script>location.assign("product_entry.php");</script>
            <?php
          }
      }
      else{
        ?>
        <script>location.assign("s_login.php");</script>
        <?php
      }
  ?>