<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/tables.css">
</head>
<body>

    <h1 class="main_title">Class Management</h1>

    <div class="center-block text-center">

        <br>
        <h2>Current Classes</h2>

        <hr>

        <table class="table-bordered table-responsive">
            <tr>
                <td>Class ID</td>
                <td>Class Name</td>
                <td>Inspect</td>
                <td>Assess</td>
                <td>Delete</td>
            </tr>
            <?php
                if ($data['classes']) {
                    foreach ($data['classes'] as $class) {
                        echo '<tr>';
                        echo '<td>' . $class[0] . '</td>';
                        echo '<td>' . $class[1] . '</td>';
                        echo '<td> <a href="' . '/AssessmentDatabase/public/ClassManagement/inspect/' . $class[1] . '/"><span class="glyphicon glyphicon-search"> </span></a></td>';
                        echo '<td> <a href="/AssessmentDatabase/public/ClassManagement/assess/' . $class[1] . '"><span class="glyphicon glyphicon-edit"> </span></a></td>';
                        echo '<td> <a href="' . '/AssessmentDatabase/public/classmanagement/delete/' . $class[1] . '/"><span class="glyphicon glyphicon-remove"> </span></a></td>';
                        echo '</tr>';
                    }
                }
            ?>
        </table>
        <br>
        <a href="/AssessmentDatabase/public/classmanagement/create/"><button type="button" class="btn btn-default">Add new class</button></a>

        <br><br><a href="/AssessmentDatabase/public/index/">&larr; Home</a>
        </div>


    </body>
</html>

