<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
</head>
<body>


    <h1 class="main_title">Report Management</h1>
    <div class="center-block text-center">

        <br><br>

        Please Select a Class and a Report Type<br>
        <form action="" method="POST">
            <select name="class">
                <!-- Class Options -->
                <option value="0"></option>
                <?php foreach($data['classes'] as $class): ?>
                    <option value="<?= $class['class_name'] ?>"><?= $class['class_name']; ?></option>
                <?php endforeach; ?>
            </select>
            <select name="report">
                <option value="0"></option>
                <option value="1">Convert Traffic Lights to National Levels</option>
                <option value="2">Identify Weakest and Strongest Pupil within the Class</option>
                <option value="3">Identify Weakest and Strongest Unit within the Class</option>
                <option value="4">Class Score Leaderboard</option>
                <option value="5">Visual Assessment Printout</option>
            </select>
            <br>
            <input type="submit" value="Create Report">
        </form>



        <br><br>
        <a href="/AssessmentDatabase/public/home/">Home</a>

    </div>
</body>
</html>