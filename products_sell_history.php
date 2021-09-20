<?php
    session_start();
    if(isset($_SESSION['userid']) && !empty($_SESSION['userid'])){
      ?>
      <!DOCTYPE html>
      <html>
          <head>
            <title>Seller Product Sell History</title>

            <style>

                body {
                    background-color: white;
                }

                #button{
                    padding: 15px;
                    width: 150px;
                    color: white;
                    font:  bold;
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
                  background-color: lightgreen;
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
              <left>Seller Product Sell History</left>
              <right><input type="button" id="button" value="Logout" onclick="s_logout();"></right>
              <right>Current User: <?php echo $_SESSION['userid'];?></right>
            </h1>

            <input type="button" id="button" value="My Products" onclick="myProducts();">
                <div style="font-size: 50px;margin: 10px;color: green;">Selling History
                </div>
                <br>
            <div>
        
              <table id="p_table" class=".text">
                <thead>
                  <tr>
                    <th>product_code</th>
                    <th>product_name</th>
                    <th>product_type</th>
                    <th>product_image</th>
                    <th>Sold_quantity</th>
                    <th>product_availablity</th>
                    <th>Remaining_quantity</th>
                    <th>product_price/unit</th>
                    <th>unit</th>
                    
                    
                  </tr>

                  <?php
                  try{

                    $conn=new PDO("mysql:host=localhost:3306;dbname=e_agro_farming;", "root", "");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sqlquary="SELECT* FROM product WHERE user_id = '$_SESSION[userid]';";
                    $pdo_obj=$conn->query($sqlquary);
                    $table_data=$pdo_obj->fetchAll();

                    if($pdo_obj->rowCount() == 0){
                      ?>
                      <tr>
                        <td colspan="7">No Data</td>
                      </tr>
                      <?php
                    }
                    else{
                      foreach ($table_data as $row) {
                        ?>

                        <tr>
                          <td><?php echo $row['product_code'] ?></td>
                          <td><?php echo $row['product_name'] ?></td>
                          <td><?php echo $row['product_type'] ?></td>
                          <td><img src="<?php echo $row['product_image'] ?>" width="300" height="200"?> </td>
                          <td><?php echo $row['product_quantity'] ?></td>
                          <td><?php echo $row['product_availablity'] ?></td>
                          <td><?php echo $row['product_quantity'] ?></td>
                          <td><?php echo $row['product_price'] ?></td>
                          <td><?php echo $row['unit'] ?></td>
                          
                      
                        </tr>

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
                   ?>
                </thead>
              </table>
            </div>

            <script>
             

              function s_logout(){
                location.assign('s_logout.php');
              }

             
              function myProducts(){
                location.assign('myProduct.php');
              }

             



            </script>

          </body>
      </html>

      <?php
    }
    else{
        ?>
        <script>location.assign("s_login.php");</script>
        <?php
    }
?>