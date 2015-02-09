<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/tables.css">
</head>
<body>

    <h1 class="main_title">Assessments - <?= $data['className'] ?></h1>

    <br><br>

    <div class="center-block text-center">

        Select the Unit you wish to mark and create a UNIQUE identifier for it. (Max. 16 Characters)

        <br><br>

        <form action="" method="POST">
            Assessment Identifier: <input type="text" name="identifier">
            <select name="unit">
                <?php foreach ($data['units'] as $unit) {
                    echo '<option value=' . $unit['unit_id'] . '>' .$unit['unit_name'] . '</option>';
                } ?>
            </select><br><br>
            <input type="submit" value="Create Assessment">
        </form>

        <br>

    <table class="table-bordered table-responsive">
        <tr>
            <td>Assessment</td>
            <td>Unit</td>
            <td>Mark</td>
            <td>Delete</td>
        </tr>
        <?php
            foreach($data['assessments'] as $assessment)
            {
                echo '<tr>';
                echo '<td>' . $assessment['identifier'] . '</td>';
                echo '<td>' . $assessment['unit_id'] . '</td>';
                echo '<td><a href="/AssessmentDatabase/public/classmanagement/mark/' . $data['className'] . '/' . $assessment['identifier'] . '/">MarkIcon</a></td>';
                echo '<td><a href="/AssessmentDatabase/public/classmanagement/deleteAssessment/' . $data['className'] . '/' . $assessment['identifier'] . '/">DeleteIcon</a></td>';
                echo '</tr>';
            }
        ?>
    </table>




    </div>

</body>
</html>
