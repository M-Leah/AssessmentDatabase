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
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
</head>
<body>

    <h1 class="main_title">Recovery Form</h1>

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
            <input type="submit" class="btn btn-default pull-right" value="Send Email">
        </form>

        Return to the <a href="/AssessmentDatabase/public/login/">login</a> page.

    </div>





</body>
</html>