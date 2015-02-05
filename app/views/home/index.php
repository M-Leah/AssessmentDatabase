<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
</head>
<body>


<h1 class="main_title"><?= $data['name'] ?>'s Dashboard</h1>


<div class="center-block text-center">

    <ul class="list-inline">
        <li><a href="/AssessmentDatabase/public/profile/">Profile</a></li>
        <li>/</li>
        <li><a href="/AssessmentDatabase/public/UnitManagement/">Unit Management</a></li>
        <li>/</li>
        <li><a href="/AssessmentDatabase/public/ClassManagement/">Class Management</a></li>
        <li>/</li>
        <li><a href="#">Report Management</a></li>
        <li>/</li>
        <li></a> <a href="/AssessmentDatabase/public/home/logout/">Logout</a></li>
    </ul>

</div>

<footer class="navbar-fixed-bottom">
    <div class="panel-footer">(C) Copyright Michael Leah 2014</div>
</footer>
</body>
</html>







