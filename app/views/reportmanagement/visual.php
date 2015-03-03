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
                <li><a href="#">Logged in as: <?php echo htmlentities(Session::get('username')) ?></a></li>
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
                <li><a href="/AssessmentDatabase/public/ClassManagement/">Class Management</a></li>
                <li class="active"><a href="/AssessmentDatabase/public/ReportManagement/">Reports <span class="sr-only">(current)</span></a></li>
                <li><a href="/AssessmentDatabase/public/Home/Logout/">Logout</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="text-center center-block">
                <!-- Replace Content From here -->

                <h1 class="page-header">Visual Reports</h1>


                <div class="center-block text-center">

<?php


    // Loop for each student
    foreach($data['studentNames'] as $student) {

        echo '<table border="1" width="90%">';
        echo '<tr>';
        echo '<td>Student Name</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>' . $student . '</td>';
        echo '</tr>';
        echo '</table>';

        echo '<table border="1" width="80%">';

        echo '<tr>';
        echo '<td>Unit Name</td>';
        echo '<td>Teacher Name</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>' . $data['unitDetails'][0]['unit_name'] . '</td>';
        echo '<td>' . $data['unitDetails'][0]['teacher_name'] . '</td>';
        echo '</tr>';
        echo '</table>';

        echo '<table border="1" width="80%">';
        echo '<tr>';
        echo '<td>Strand Code</td>';
        echo '<td>Traffic Light Awarded</td>';
        echo '<td>Teacher Comment</td>';
        echo '</tr>';



        foreach($data['detailsArray'] as $detail) {
            foreach($detail as $content) {

                if ($student == $content['student_name']) {
                    echo '<tr>';
                    echo '<td>' . $content['strand_id'] . '</td>';
                    echo '<td>' . $content['trafficlight'] . '</td>';
                    echo '<td>' . $content['comment'] . '</td>';
                    echo '</tr>';
                }

            }
        }

        echo '</table>';
        echo '<br>';
        echo '<hr>';

    }

?>


            <a href="<?php echo '/AssessmentDatabase/public/ReportManagement/' . $data['class']; ?>">&larr; Back</a>

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
</body>
</html>

