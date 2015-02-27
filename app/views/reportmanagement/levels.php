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

        <table border="1">
            <tr>
                <td>Student Name</td>
                <td>Overall Percentage</td>
                <td>National Level</td>
            </tr>
            <tr>
            <?php foreach($data['levels'] as $level): ?>
                <?php echo '<td>' . $level['student_name'] . '</td>'; ?>
                <?php echo '<td>' . $level['percentage'] . '%</td>'; ?>
                <?php echo '<td>' . $level['level'] . '</td>'; ?>
                <?php echo '</tr>'; ?>
            <?php endforeach; ?>


        </table>


        <br>
        <br>

        <a href="/AssessmentDatabase/public/ReportManagement/">Back to Report Management</a>

    </div>
</body>
</html>