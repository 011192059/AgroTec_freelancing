<!DOCTYPE html>

<html lang="en">

<head>
    <title>Seller Login</title>
    <style>
            body {
            background-color: lightgreen;
            }
            .text{
            height: 20px;
            border-radius: 5px;
            padding: 2px;
            border: solid thin green;
            width: 90%;
            }
            
            #button{
            padding: 10px;
            width: 120px;
            color: black;
            background-color: green;
            border: none;
            }
            #box{
            background-color: green;
            border: auto;
            margin: auto;
            width: 300px;
            padding: 50px;
            }
        </style>
</head>
<body>

    <form action="s_login_process.php" method="POST" enctype="multipart/form-data" id="box">
        <label for="userid">USER ID</label>
        <input type="text" id="userid" name="userid">
        <br> <br>
        <label for="mypass">PASSWORD</label>:
        <input type="password" id="mypass" name="mypass">
        <br> <br>
       
        <input type="submit" value="Click To Login">
    </form>
    
</body>
</html>