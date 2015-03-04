<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Assessment Database</title>

    <!-- Bootstrap core CSS -->
    <link href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/AssessmentDatabase/public/css/home.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand link" href="/AssessmentDatabase/public/Home/">Assessment Database</a>
        </div>
        <div id="navbar">
            <form class="navbar-form navbar-right" action="" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Username" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-default">Sign in</button>
                <h5 class="label-warning"><?= $data['error']; ?></h5>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="main_title">Assessment Database</h1>
        <p>Teacher's passion is teaching, not administrative work. However there is an ever increasing requirement for teachers to spend countless hours sat working through spreadsheets to monitor student progress. This web application is a tool to help ease the process and save teachers time so they can focus on their passion: Teaching.</p>
    </div>
</div>

<div class="container">
    <hr>
    Forgotten your <a href="/AssessmentDatabase/public/login/recover/username/">Username</a> or <a href="/AssessmentDatabase/public/login/recover/password/">Password</a>?
    <footer>
        <p>&copy; Michael Leah, Teesside University, 2014</p>
    </footer>
</div> <!-- /container -->

</body>
</html>
