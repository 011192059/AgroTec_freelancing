<?php

session_start();
if(
    isset($_SESSION['userid'])
    && !empty($_SESSION['userid'])
    ){
    unset($_SESSION['userid']);
    
    session_destroy();
    
    ?>
        <script>alert("logged out successfully!");</script>
        <script>location.assign("s_login.php");</script>
    <?php 
    
}
else{
    ?>
        <script>location.assign("s_login.php");</script>
    <?php 
}

?>