<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 19/11/2014
 */

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../public/css/header.css">
    </head>
    <body>


        <h1>Login!</h1>


    <div id="content">

        <div id="error_message">
            <?= $data['error']; ?>
        </div>

        <form action="" method="POST">
            <input type="text" placeholder="Username" name="username"><br><br>
            <input type="password" placeholder="Password" name="password"><br><br>
            <input type="submit" value="Login">
        </form>
     </div>

    </body>
</html>
