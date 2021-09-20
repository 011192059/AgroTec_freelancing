<?php
session_start();
if(
    isset($_SESSION['userid'])
   
    && !empty($_SESSION['userid'])
    

)
{
  
    $userid = $_SESSION['userid'];
    ?>

    <!DOCTYPE html>

    <html lang="en">
        <head>
        <title>Profile</title>

        <style>

                body {
                        background-color: green;
                    }

                .text{

                            height: 25px;
                            border-radius: 5px;
                            padding: 2px;
                            border: solid thin #aaa;
                            width: 90%;
                        }
                            

                        #button{

                            padding: 10px;
                            width: 200px;
                            color: white;
                            background-color: black;
                            border: none;
                        }

                        #box{

                            background-color: lightgreen;
                            margin: auto;
                            width: 500px;
                            padding: 50px;
                        }


                
                </style>

        </head>

        <body>


        
                <input id="button" type="button" value="Home Page" onclick="home()"> 
                <input id="button" type="button" value="My Product" onclick="product()">
              
        
        <br><br>
        <div id="box" style="font-size: 20px;margin: 10px;">Welcome 
        <br><br>
        
        <?php 

        try{
            // PHP Data Object
            $conn=new PDO("mysql:host=localhost:3306;dbname=e_agro_farming;","root","");
            ///setting 1 environment variable
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
            
            ///executing mysql query
            $signupquery="SELECT * FROM users WHERE user_id = '".$userid."'";
            
        
            $returnobj = $conn->query($signupquery);
            $returntable = $returnobj->fetchAll();

            if($returnobj->rowCount() == 1)
            {
                foreach($returntable as $row){
                ?><br><?php
                echo "USER ID : ".$row['user_id'];
                ?><br><?php
                echo "user type : ".$row['user_type'];
                ?><br><?php
                echo "mobile no : ".$row['mobile_no'];
                ?><br><?php
                echo "nid no : ".$row['NID_no'];
                ?><br><?php
                echo "Log in pass : ".$row['login_password'];
                ?><br><?php
                echo "point : +880".$row['user_point'];
                ?><br><?php
                echo "Account Number : ".$row['user_account_no'];
                ?><br><?php
                echo "Country : ".$row['country'];
                ?><br><?php
                echo "Postal Code : ".$row['postal_code'];
                ?><br><?php
                echo "email id : ".$row['email_id'];
            }
            }
        }
        catch(PDOException $e){
            ?>
                <script>location.assign("s_login.php");</script>
            <?php
        }
        
        ?>

        <br>
        <br><br>


        <input id="button" type="button" value="Click to Logout" onclick="logoutfn();">

        </div>
        

        <br>

        <script>
                  
                    function product(){
                        location.assign('myProduct.php');   ///default GET method
                    }
                    
                    function logoutfn(){
                        location.assign('s_logout.php');   ///default GET method
                    }

                 
        </script>

        
        
        </body>
    </html>

    <?php
}


?>