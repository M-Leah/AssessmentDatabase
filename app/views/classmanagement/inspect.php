<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        ClassManagement / View.

        <br><br>

        ClassList (WIP) <br>


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
                echo '<td> <a href="' . '/AssessmentDatabase/public/classmanagement/edit/' . $student[0] . '/">EDITICON</a></td>';
                echo '<td> <a href="' . '/AssessmentDatabase/public/classmanagement/deletestudent/' . $student[0] . '/">DELETEICON</a></td>';
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

    </body>
</html>