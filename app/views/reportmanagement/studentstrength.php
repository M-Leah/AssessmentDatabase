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
                <li><a href="/AssessmentDatabase/public/ClassManagement/">Class Management</a></li>
                <li class="active"><a href="/AssessmentDatabase/public/ReportManagement/">Reports <span class="sr-only">(current)</span></a></li>
                <li><a href="/AssessmentDatabase/public/Home/Logout/">Logout</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="text-center center-block">
                <!-- Replace Content From here -->

                <h1 class="page-header">Student Strength (<?php echo $data['class'] ?>)</h1>

                <h3>Strongest Student(s)</h3>
                <table border="1" width="75%">
                    <tr>
                        <td>Student Name</td>
                        <td>National Level</td>
                    </tr>
                    <tr>
                    <?php foreach($data['strongest'] as $student): ?>
                        <?php echo '<td>' . $student['student_name'] . '</td>'; ?>
                            <?php foreach($data['levels'] as $level): ?>
                                <?php if($level['student_name'] == $student['student_name']): ?>
                                    <?php echo '<td>'. $level['level'] . '</td>'; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php echo '</tr>'; ?>
                    <?php endforeach; ?>
                </table>


                <br><br>

                <table border="1" width="75%">
                    <tr>
                        <td>Identifier</td>
                        <td>Student</td>
                        <td>Strand ID</td>
                        <td>Traffic Light</td>
                        <td>Comment</td>
                    </tr>
                    <tr>
                    <?php foreach($data['strongestDetails'] as $detail): ?>
                        <?php foreach($detail as $student): ?>
                            <?php echo '<td>' . $student['identifier'] . '</td>'; ?>
                            <?php echo '<td>' . $student['student_name'] . '</td>'; ?>
                            <?php echo '<td>' . $student['strand_id'] . '</td>'; ?>
                            <?php echo '<td>' . $student['trafficlight'] . '</td>'; ?>
                            <?php echo '<td>' . $student['comment'] . '</td>'; ?>
                            <?php echo '</tr>'; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </table>

                <br><br>

                <h3>Weakest Student(s)</h3>
                <table border="1" width="75%">
                    <tr>
                        <td>Student Name</td>
                        <td>National Level</td>
                    </tr>
                    <tr>
                        <?php foreach($data['weakest'] as $student): ?>
                            <?php echo '<td>' . $student['student_name'] . '</td>'; ?>
                            <?php foreach($data['levels'] as $level): ?>
                                <?php if($level['student_name'] == $student['student_name']): ?>
                                    <?php echo '<td>'. $level['level'] . '</td>'; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php echo '</tr>'; ?>
                        <?php endforeach; ?>
                </table>

                <br><br>


                <?php foreach($data['weakestDetails'] as $detail): ?>

                    <table border="1" width="75%">
                        <tr>
                            <td>Identifier</td>
                            <td>Student</td>
                            <td>Strand ID</td>
                            <td>Traffic Light</td>
                            <td>Comment</td>
                        </tr>
                        <tr>

                        <?php foreach($detail as $student): ?>
                            <?php echo '<td>' . $student['identifier'] . '</td>'; ?>
                            <?php echo '<td>' . $student['student_name'] . '</td>'; ?>
                            <?php echo '<td>' . $student['strand_id'] . '</td>'; ?>
                            <?php echo '<td>' . $student['trafficlight'] . '</td>'; ?>
                            <?php echo '<td>' . $student['comment'] . '</td>'; ?>
                            <?php echo '</tr>'; ?>
                        <?php endforeach; ?>

                    </table>
                    <br><br>

                <?php endforeach; ?>


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
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
