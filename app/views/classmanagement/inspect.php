<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/AssessmentDatabase/public/css/tables.css">
</head>
<body>
        <h1 class="main_title">Class Management: <?= $data['className']; ?> </h1>

        <br>

        <div class="center-block text-center">

            Class List
            <br><br>


        <table border="1">
            <tr>
                <td>Student ID</td>
                <td>Student Name</td>
                <td>Student Class</td>
                <td>Teacher</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        <?php

            foreach($data['students'] as $student) {
                echo '<tr>';
                echo '<td>' . $student[0] . '</td>';
                echo '<td>' . $student[1] . '</td>';
                echo '<td>' . $student[2] . '</td>';
                echo '<td>' . $student[3] . '</td>';
                echo '<td> <a href="' . '/AssessmentDatabase/public/classmanagement/edit/' . $student[0] . '/"><span class="glyphicon glyphicon-edit"> </span></a></td>';
                echo '<td> <a href="' . '/AssessmentDatabase/public/classmanagement/deletestudent/' . $student[0] . '/"><span class="glyphicon glyphicon-remove"> </span></a></td>';
                echo '</tr>';
            }
        ?>
        </table>
        <br>
        Add new student to this class:

        <form action="" method="POST">
            <input type="text" name="studentName">
            <input type="submit" value="Add Student">
        </form>
        <?= $data['message']; ?>


        <br>
        <a href="/AssessmentDatabase/public/ClassManagement/">Back to Class Management</a>

        </div>

    </body>
</html>