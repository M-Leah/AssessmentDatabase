<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/tables.css">
</head>
<body>

<h1 class="main_title">Strongest and Weakest Student</h1>

<br><br>

    <div class="center-block text-center">

        <h2 class="modal-title">Strongest Student</h2>
    <table class="table-bordered table-responsive">

        <tr>
            <td>Student Name</td>
            <td>Score</td>
        </tr>
        <tr>
        <?php foreach($data['strongestStudents'] as $student): ?>
            <?php echo '<td>' . $student['student_name'] . '</td>'; ?>
            <?php echo '<td>' . $student['score'] . '</td>'; ?>
            <?php echo '</tr>'; ?>
        <?php endforeach; ?>
    </table>
    <br>
    <table class="table-bordered table-responsive">
        <tr>
        <?php // Student Name, Unit ID, Strand ID, Traffic Light, Comment ?>
            <td>Strand ID</td>
            <td>Traffic Light</td>
            <td>Comment</td>
        </tr>
        <tr>
       </tr>

    </div>
</body>
</html>