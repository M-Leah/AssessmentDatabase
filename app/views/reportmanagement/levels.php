<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/tables.css">
</head>
<body>


    <h1 class="main_title">National Levels</h1>


    <div class="center-block text-center">

        <br><br>

        <table class="table-bordered table-responsive">
            <tr>
                <td>Student Name</td>
                <td>Overall Score</td>
                <td>National Level</td>
            </tr>
            <?php
                $count = 0;
                foreach ($data['scores'] as $score) {
                    echo '<tr>';
                    echo '<td>' . $score['student_name'] . '</td>';
                    echo '<td>' . $score['score'] . '</td>';
                    echo '<td>' . $data['levels'][$count]['level'] . '</td>';
                    echo '</tr>';
                    $count++;
                }


            ?>
        </table>

        <br>
        <br>

        <a href="/AssessmentDatabase/public/ReportManagement/">Back to Report Management</a>

    </div>
</body>
</html>