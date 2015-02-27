<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/tables.css">
</head>
<body>


    <h1 class="main_title">Report Management</h1>
    <div class="center-block text-center">

        <br><br>
        Please Select the class you wish to generate a report for:
        <br><br>

        <table class="table-bordered table-responsive">
            <tr>
                <td>Class</td>
                <td>Generate Report</td>
            </tr>
        <?php foreach($data['classes'] as $class): ?>
            <?php echo '<tr>'; ?>
            <?php echo '<td>' . $class['class_name'] . '</td>'; ?>
            <?php echo '<td><a href="/AssessmentDatabase/public/ReportManagement/' . $class['class_name'] . '"><span class="glyphicon glyphicon-list-alt"> </span></a></td>'; ?>
            <?php echo '</tr>'; ?>
        <?php endforeach; ?>
        </table>

        <br><br>
        <a href="/AssessmentDatabase/public/home/">Home</a>
    </div>
</body>
</html>