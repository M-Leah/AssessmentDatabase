<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
</head>
<body>


    <h1 class="main_title">Report Management (<?php echo $data['className'] ?>)</h1>
    <div class="center-block text-center">

        <br><br>

        Select the Units to Include in the Report:
        <form action="" method="post">
        <?php $count = 0; ?>
        <?php foreach($data['identifiers'] as $identifier): ?>
            <?php echo '<input type="checkbox" name="' . $count . '" value="'. $identifier['identifier'] . '"> ' . $identifier['identifier']; ?>
            <?php $count++; ?>
        <?php endforeach; ?>
            <br><br>
            <select name="options">
                <option value="0">Convert Scores to National Levels</option>
                <option value="1">Visual Assessment Report</option>
                <option value="2">Strongest and Weakest Units</option>
                <option value="3">Strongest and Weakest Pupils</option>
            </select>
            <br><br>
            <input type="submit" value="Generate Report">
        </form>





        <br><br>
        <a href="/AssessmentDatabase/public/ReportManagement/">Home</a>

    </div>
</body>
</html>