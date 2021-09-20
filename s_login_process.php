<?php
/*
    1. collect the data from s_login.php page
    2. encrypt the collected password
    3. match the collected data with the database data
   
*/

if ($_SERVER['REQUEST_METHOD'] == 'POST' )
{
    
    if(  
       isset($_POST['userid'])     
        && isset($_POST['mypass'])
        && !empty($_POST['userid'])
        && !empty($_POST['mypass'])
    ){

        $userid=$_POST['userid'];
        $password=$_POST['mypass'];

        echo $userid;
        echo $password;
        
        try{
            // PHP Data Object
            
            $conn=new PDO("mysql:host=localhost:3306;dbname=e_agro_farming;","root","");
            
            ///setting 1 environment variable
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       

    
      
            $sqlquery="SELECT * FROM users WHERE  user_id = '$userid' and login_password = '$password';";
            $pdo_obj = $conn->query($sqlquery); 

            
      
            if($pdo_obj->rowCount() == 1){
                session_start();
                $_SESSION['userid'] = $userid;
                   
                ?>
                <script>location.assign("profile.php");</script>
                <?php
            }
            else {
            ?>
                <script>location.assign("s_login.php");</script>
               
               
            <?php
            }
            
            }
            catch(PDOException $e){
                ?>
                   <script>location.assign("s_login.php");</script>
                   
                <?php
            }
    }   
else
{
    ?>
        <script>location.assign("s_login.php");</script>
    <?php
}
}
?>