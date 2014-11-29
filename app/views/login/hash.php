<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 24/11/2014
 */
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../../public/css/header.css">
    <link rel="stylesheet" href="../../../public/css/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/css/bootstrap_css/bootstrap-theme.min.css">
</head>
<body>

<h1 class="main_title">Recover Password Form</h1>

<div class="content center-block">

    <div class="alert-warning">
        <?= $data['error']; ?>
    </div>

    <div class="alert-success">
        <?= $data['message']; ?>
    </div>

    <form action="" method="POST">
        <div class="form-group">
            <label for="inputEmail">Email</label><br>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputPassword">New Password</label><br>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputConfirm">Confirm New Password</label><br>
            <input type="text" name="confirm_password" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputHash">Hash</label><br>
            <input type="text" name="hash" class="form-control">
        </div>
        <input type="submit" class="btn btn-primary pull-right" value="Submit Changes">
    </form>

    Return to the <a href="/assessmentdatabase/public/login/">login</a> page.

</div>





</body>
</html>