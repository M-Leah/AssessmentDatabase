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
    <link href="/AssessmentDatabase/public/css/dashboard.css" rel="stylesheet">
    <link href="/AssessmentDatabase/public/css/tables.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/AssessmentDatabase/public/home/">Assessment Database</a>
        </div>
        <div id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Logged in as: <?php echo htmlentities(Session::get('username')); ?></a></li>
            </ul>

        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="/AssessmentDatabase/public/Home/">Home</a></li>
                <li><a href="/AssessmentDatabase/public/UnitManagement/">Unit Management</a></li>
                <li class="active"><a href="/AssessmentDatabase/public/ClassManagement/">Class Management <span class="sr-only">(current)</span></a></li>
                <li><a href="/AssessmentDatabase/public/ReportManagement/">Reports</a></li>
                <li><a href="/AssessmentDatabase/public/Home/Logout/">Logout</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="text-center center-block">
                <!-- Replace Content From here -->



                <h1 class="page-header">Class Management: <?= $data['className']; ?> </h1>

                <br>

                    Class List
                    <br><br>


                    <table border="1">
                        <tr>
                            <td>Student ID</td>
                            <td>Student Name</td>
                            <td>Student Class</td>
                            <td>Teacher</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        <?php

                        foreach($data['students'] as $student) {
                            echo '<tr>';
                            echo '<td>' . $student[0] . '</td>';
                            echo '<td>' . $student[1] . '</td>';
                            echo '<td>' . $student[2] . '</td>';
                            echo '<td>' . $student[3] . '</td>';
                            echo '<td> <a href="' . '/AssessmentDatabase/public/classmanagement/edit/' . $student[0] . '/"><span class="glyphicon glyphicon-edit"> </span></a></td>';
                            echo '<td> <a href="' . '/AssessmentDatabase/public/classmanagement/deletestudent/' . $student[0] . '/"><span class="glyphicon glyphicon-remove"> </span></a></td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                    <br>
                    Add new student to this class:

                    <form action="" method="POST">
                        <input type="text" class="form-inline"  name="studentName">
                        <input type="submit" class="btn btn-default" value="Add Student">
                    </form>
                    <?= $data['message']; ?>


                    <br>
                    <a href="/AssessmentDatabase/public/ClassManagement/">&larr; Back</a>




                <!-- Content Replacement ends here -->
            </div>
        </div>
    </div>
</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/AssessmenDatabase/public/js/bootstrap/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>


