<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/tables.css">
</head>
<body>

    <h1 class="main_title">Edit Student</h1>

    <div class="text-center center-block">

    <hr>
        <form action="" method="POST">
            Change name to:<br>
            <input type="text" name="newName">
            <input type="submit" value="Update">
        </form>

        <?= $data['message']; ?> <br>

        <a href="/AssessmentDatabase/public/Classmanagement/">Back to Class Management</a>

    </div>
</body>
</html>