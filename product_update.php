<?php
    session_start();
    if(isset($_SESSION['userid']) && !empty($_SESSION['userid'])){
      if( isset($_GET['product_code']) && !empty($_GET['product_code'])){
            $product_code=$_GET['product_code'];

            try{

              $conn=new PDO("mysql:host=localhost:3306;dbname=e_agro_farming;", "root", "");
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $sqlquary="SELECT* FROM product WHERE product_code = $product_code";
              $pdo_obj=$conn->query($sqlquary);
              $table_data=$pdo_obj->fetchAll();

              if($pdo_obj->rowCount() == 0){
                ?>
                <script>location.assign("myProduct.php");</script>
                <?php
              }
              else{
                foreach ($table_data as $row) {
                  ?>

                  <!DOCTYPE html>
                  <html>
                    <head>
                      <title>Poduct Update</title>
                      <style>

                          body {
                              background-color: white;
                          }

                          #button{
                              padding: 10px;
                              width: 120px;
                              color: white;
                              background-color: green;
                              border: none;
                          }

                          #box{
                              background-color: AliceBlue;
                              margin: auto;
                              width: 400px;
                              padding: 20px;
                          }

                          #p_table{
                              width: 100%;
                              border: 1px solid blue;
                              border-collapse: collapse;
                          }

                          #p_table th, #p_table td{
                              border: 1px solid blue;
                              border-collapse: collapse;
                              text-align: center;
                          }

                          #p_table tr:hover{
                            background-color:lightgreen;
                          }

                          .text{
                              height: 25px;
                              border-radius: 5px;
                              padding: 2px;
                              border: solid thin #aaa;
                              width: 90%;
                          }

                          .header {
                            background-color: black;
                            overflow: hidden;
                          }

                          .header left {
                            float: left;
                            color: #f2f2f2;
                            text-align: center;
                            padding: 14px 16px;
                            text-decoration: none;
                            font-size: 30px;
                          }

                          .header right {
                            float: right;
                            color: #f2f2f2;
                            text-align: center;
                            padding: 14px 16px;
                            text-decoration: none;
                            font-size: 20px;
                          }

                      </style>
                    </head>
                    <body>
                      <h1 class="header">
                        <left>Product Update</left>
                        <right><input type="button" id="button" value="Logout" onclick="s_logout();"></right>
                        <right>Current User: <?php echo $_SESSION['userid'];?></right>
                      </h1>

                      <form action="product_update_insert.php" method="post" enctype="multipart/form-data" id="box">
                        <label for="product_code">Product Code</label>
                        <input type="text" id="product_code" name="product_code" value="<?php echo $row['product_code'] ?>" readonly>
                        <br><br>
                        <label for="product_name">Product Name</label>
                        <input type="text" id="product_name" name="product_name" value="<?php echo $row['product_name'] ?>">
                        <br><br>
                        <label for="product_type">Product Type</label>
                        <input type="text" id="product_type" name="product_type" value="<?php echo $row['product_type'] ?>">
                        <br><br>
                        <label for="product_availablity">Product Availablity</label>
                        <input type="text" id="product_availablity" name="product_availablity" value="<?php echo $row['product_availablity'] ?>">
                        <br><br>
                        <label for="product_quantity">Product Quantity</label>
                        <input type="text" pattern="[0-9]*" id="product_quantity" name="product_quantity" value="<?php echo $row['product_quantity'] ?>" >
                        <select id="unit" name="unit" value="<?php echo $row['unit'] ?>">
                          <option value="Kg">Kg</option>
                          <option value="g">g</option>
                          <option value="Piece">Piece</option>
                        </select>
                        <br><br>
                        <label for="product_price">Product Price</label>
                        <input type="text" pattern="[0-9]*" id="product_price" name="product_price" value="<?php echo $row['product_price'] ?>" >
                        <br><br>
                        <input type="submit" id="button" value="UPDATE">
                        <input type="button" id="button" value="Back" onclick="back();">
                      </form>
                      <script>
                        function back(){
                          location.assign('myProduct.php');
                        }
                        function s_logout(){
                          location.assign('s_logout.php');
                        }
                      </script>
                    </body>
                    </html>

                  <?php
                }
              }
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