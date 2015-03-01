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
                <li><a href="#">Logged in as: <?php echo Session::get('username'); ?></a></li>
            </ul>

        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="/AssessmentDatabase/public/Home/">Home</a></li>
                <li class="active"><a href="/AssessmentDatabase/public/UnitManagement/">Unit Management <span class="sr-only">(current)</span></a></li>
                <li><a href="/AssessmentDatabase/public/ClassManagement/">Class Management</a></li>
                <li><a href="/AssessmentDatabase/public/ReportManagement/">Reports</a></li>
                <li><a href="/AssessmentDatabase/public/Home/Logout/">Logout</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <div class="text-center center-block">

                <h1 class="page-header"><?= $data['unitName'][0]['unit_name']; ?></h1>


                <div class="center-block text-center">
                    <br>
                    <h3>Add/Remove Strands</h3>


                    <br>

                    <div class="center-block text-center">

                        <table class="table-bordered table-responsive">
                            <tr>
                                <td>Strand ID</td>
                                <td>Strand Description</td>
                                <td>Remove Strand</td>
                            </tr>
                            <?php
                            if ($data['strandDetails'] != null) {
                                foreach ($data['strandDetails'] as $strand) {
                                    echo '<tr>';
                                    echo '<td>' . $strand[0]['strand_id'] . '</td>';
                                    echo '<td>' . $strand[0]['strand_description'] . '</td>';
                                    echo '<td> <a href="/AssessmentDatabase/public/UnitManagement/deletestrand/' . $data['unitName'][0]['unit_id'] . '/' . $strand[0]['strand_id'] . '/""><span class="glyphicon glyphicon-remove"> </span></a></td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </table>

                        <br><br>

                        Add New Strands
                        <form action="" method="POST">
                            <select name="strands">
                                <option value="0"> </option>
                                <option value="1">Computer Science</option>
                                <option value="2">Information Technology</option>
                                <option value="3">Digital Literacy</option>
                            </select>
                            <input type="submit" value="Load Strands">
                        </form>

                        <br>


                        <?php  if ($data['strandReference'] != null) { ?>

                        <table class="table-bordered table-responsive">
                            <tr>
                                <td>Strand ID</td>
                                <td>Strand Description</td>
                                <td>Add Strand</td>
                            </tr>

                            <?php


                            foreach ($data['strandReference'] as $strand) {
                                echo '<tr>';
                                echo '<td>' . $strand['strand_id'] . '</td>';
                                echo '<td>' . $strand['strand_description'] . '</td>';
                                echo '<td> <a href="/AssessmentDatabase/public/UnitManagement/addstrand/'. $data['unitName'][0]['unit_id'] .'/' . $strand['strand_id'] .'/"><span class="glyphicon glyphicon-plus"> </span></a></td>';
                                echo '</tr>';
                            }

                            }

                            ?>
                        </table>

                        <br><br>
                        <a href="/AssessmentDatabase/public/UnitManagement/">&larr; Back</a>
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



    </body>
</html>
