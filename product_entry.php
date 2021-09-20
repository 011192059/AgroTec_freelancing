<?php
    session_start();
    if(isset($_SESSION['userid']) && !empty($_SESSION['userid'])){
        $userid=$_SESSION['userid'];
      ?>
      <!DOCTYPE html>

      <html>
          <head>
            <title>Product Entry</title>
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
                    background-color: lightgreen;
                    margin: auto;
                    width: 400px;
                    border: 15px green;
                    padding: 50px;
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
                  background-color: cyan;
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
            <body>
              <h1 class="header">
              
                <left> Enter The Products Here </left>
                <right><input type="button" id="button" value="Logout" onclick="logout();"></right>
                <right>Current User: <?php echo $_SESSION['userid'];?></right>
              </h1>

            <form action="product_insert.php" method="post" enctype="multipart/form-data" id="box">
           
            <label for="product_name">Product Name</label>
              <input type="text" id="product_name" name="product_name">
              <br><br>
              <label for="product_type">Product Type</label>
              <input type="text" id="product_type" name="product_type">
              <br><br>
              <label for="product_image">Product Image</label>
              <input type="file" id="product_image" name="product_image">
              <br><br>
              <br><br>
              <label for="product_availablity">Product Availablity</label>
              <input type="text" id="product_availablity" name="product_availablity">
              <br><br>
              <label for="product_quantity">Product Quantity</label>
              <input type="text" id="product_quantity" name="product_quantity" >
                <select id="unit" name="unit">
                <option value="Kg">Kg</option>
                <option value="g">g</option>
                <option value="Piece">Piece</option>
              </select>
              <br><br>
              <label for="product_price">Product Price/Unit</label>
              <input type="text" id="product_price" name="product_price" >
              <br><br>
              <input type="submit" id="button" value="ADD">
              <input type="button" id="button" value="Back" onclick="back();">
            </form>

            <script>
              function back(){
                location.assign('myProduct.php');
              }
              function logout(){
                location.assign('s_logout.php');

               
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
