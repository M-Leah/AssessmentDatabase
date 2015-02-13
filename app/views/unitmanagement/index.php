<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/tables.css">
</head>
<body>


<h1 class="main_title">Unit Management</h1>


<div class="center-block text-center">

    <br>
    <?php if (isset($data['error'])) { echo $data['error']; } ?>
    <br><br>

    <?php if (is_array($data['units'])) { ?>

    Your Units:<br><br>
    <table class="table-bordered table-responsive">
        <tr>
            <td>Unit ID</td>
            <td>Unit Name</td>
            <td>Teacher Name</td>
            <td>Edit Criteria</td>
            <td>Delete Unit</td>
        </tr>
    <?php
            foreach ($data['units'] as $unit) {
                echo '<tr>';
                echo '<td>' . $unit['unit_id'] . '</td>';
                echo '<td>' . $unit['unit_name'] . '</td>';
                echo '<td>' . $unit['teacher_name'] . '</td>';
                echo '<td> <a href="/AssessmentDatabase/public/UnitManagement/Edit/' . $unit['unit_id'] . '"><span class="glyphicon glyphicon-edit"> </span></a></td>';
                echo '<td> <a href="/AssessmentDatabase/public/UnitManagement/DeleteUnit/' . $unit['unit_id'] . '/"><span class="glyphicon glyphicon-remove"> </span></a></td>';
                echo '</tr>';
            }
        }
    ?>
    </table>

    <br><br>

    <form action="" method="POST">
        Unit Name: <br>
        <input type="text" name="unitName">
        <input type="submit" value="Create new Unit">
    </form>

    <br>
    <a href="/AssessmentDatabase/public/home/">&larr; Home</a>

</div>


</body>
</html>