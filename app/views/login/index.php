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
        <link rel="stylesheet" href="../../public/css/bootstrap_css/bootstrap.min.css">
        <link rel="stylesheet" href="../../public/css/bootstrap_css/bootstrap-theme.min.css">
    </head>
    <body>


        <h1 class="main_title">Assessment Database</h1>


    <div class="content center-block">

        <div class="alert-warning">
            <?= $data['error']; ?>
        </div>

        <div class="form_title">Login</div>
        <form action="" method="POST">
            <div class="form-group">
                <label for="inputUsername">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="pull-left">Forgotten your <a href="/assessmentdatabase/public/login/recover/username/">Username</a> or <a href="/assessmentdatabase/public/login/recover/password/">Password</a>?</div>
            <input type="submit" class="btn btn-primary pull-right" value="Login">
        </form>

     </div>

    <footer class="navbar-fixed-bottom">
        <div class="panel-footer">(C) Copyright Michael Leah 2014</div>
    </footer>
    </body>
</html>
