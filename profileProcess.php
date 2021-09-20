<?php
/*
step 1: to receive the email and password data from register.php
step 2: to store the data within the database
step 3: if data store is successful then forward to s_login.php
        else forward to register.php
*/

session_start();

if(
    isset($_SESSION['userid'])
  
    && !empty($_SESSION['userid'])
    )
    {

   
    $username = $_SESSION['userid'];


    if($_SERVER['REQUEST_METHOD']=='POST'){
            
        if(isset($_POST['user_id']) 
            && isset($_POST['NID_no'])
            && isset($_POST['mobile_no'])
            && isset($_POST['user_account_no'])
            && isset($_POST['country'])
            && isset($_POST['postal_code'])

            && !empty($_POST['user_id'])
            && !empty($_POST['NID_no'])
            && !empty($_POST['mobile_no'])
            && !empty($_POST['user_account_no'])
            && !empty($_POST['country'])
            && !empty($_POST['postal_code'])
            )
            {

                $name=$_POST['user_id'];
                $nid=$_POST['NID_no'];
                $contact=$_POST['mobile_no'];
                $account=$_POST['user_account_no'];
                $country=$_POST['country'];
                $postal_code=$_POST['postal_code'];


                    ///store the data to database
                try{
                    // PHP Data Object
                    $conn=new PDO("mysql:host=localhost:3306;dbname=e_agro_farming;","root","");
                    ///setting 1 environment variable
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                if( isset($_POST['oldpass'])
                    && isset($_POST['mypass'])
                    && !empty($_POST['oldpass'])
                    && !empty($_POST['mypass'])
                ){
                    $oldpass=$_POST['oldpass'];
                    $pass=$_POST['mypass'];

                    $enc_password = md5($oldpass);
                    $new_enc_password = md5($pass);

                    $myquery="SELECT * FROM users WHERE  user_id = '".$userid."' and password ='".$password."'";

                    $returnobj = $conn->query($myquery);  // the return object is pdo statement object

                    if($returnobj->rowCount() == 1){

                        ///executing mysql query
                        
                        $signupquery="UPDATE "." SET ID='$user_id', password='$password', Country='$country', mobile_no=$mobile_no, "."user_account_no=$user_account_no, Postal Code='$postal_code', NID/Birth Certificate='$NID_no' WHERE user_id='$userid'";
                           
                        $conn->exec($signupquery);

                        ?>
                        <script>alert("Profile Updated!");</script>
                        <script>location.assign("s_login.php");</script>
                        <?php
                    }
                    
                }

                $signupquery="UPDATE "." SET ID='$user_id', Country='$country', mobile_no=$mobile_no, "."user_account_no=$user_account_no, Postal Code='$postal_code', NID='$NID_no' WHERE user_id='$userid'";
                           
                $conn->exec($signupquery);

                ?>
                    <script>alert("Profile Updated!");</script>
                    <script>location.assign("profile.php");</script>
                <?php



          
                }
                catch(PDOException $ex){
                    ?>
                        <script>alert("Database Error!");</script>
                        <script>location.assign("updateProfile.php");</script>
                    <?php
                }
                
                }

                else{
                ///if email and password data is empty or not set
                /// register.php --> registeruser.php --> register.php
                ?>
                <script>alert("Fill up all required fields!");</script>
                <script>location.assign("updateProfile.php");</script>
                <?php
                
                }
                
            }
            else{
                ///if email and password data is empty or not set
                /// register.php --> registeruser.php --> register.php
                ?>
                <script>location.assign("updateProfile.php");</script>
                <?php
                
            }
            
    }
        
    ?>

  
