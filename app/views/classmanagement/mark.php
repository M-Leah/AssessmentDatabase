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

                <h1 class="page-header">Mark</h1>


                <table class="table-bordered table-responsive">
                    <tr>
                        <td>Student Name</td>
                        <td>Unit Name</td>
                        <td>Overall Comment</td>
                    </tr>

                    <form action="" method="POST">
                        <?php
                        $count = 0;
                        foreach ($data['comments'] as $student) {
                            echo '<tr>';
                            echo '<td><a href="/Assessmentdatabase/public/classmanagement/mark/' . $data['className'] . '/' . $data['identifier']. '/' . $student['student_name'] . '/"> ' . $student['student_name'] . ' </a>';
                            echo '<td>' . $data['unitName'][0]['unit_name'] . '</td>';
                            echo '<td><textarea rows="2" cols="30" name="' . $count . '">' . $student['comment'] . '</textarea></td>';
                            echo '</tr>';
                            $count++;
                        }
                        ?>

                </table>

                <br>

                <input type="submit" class="btn btn-default" value="Update Comments">
                </form>
                <br><br>


                <a href="/AssessmentDatabase/public/ClassManagement/assess/<?=$data['className'];?>">&larr; Back</a>



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

