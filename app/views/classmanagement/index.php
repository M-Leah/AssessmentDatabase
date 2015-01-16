<!DOCTYPE html>

<html>
    <head></head>
    <body>
        Class Management -> Index.
        <br><br>

        Current Classes: <hr>


        <table border="1">
            <tr>
                <td>Class ID</td>
                <td>Data Class Name</td>
                <td>Inspect</td>
                <td>Mark</td>
                <td>Delete</td>
            </tr>
            <?php
                if ($data['classes']) {
                    foreach ($data['classes'] as $class) {
                        echo '<tr>';
                        echo '<td>' . $class[0] . '</td>';
                        echo '<td>' . $class[1] . '</td>';
                        echo '<td> <a href="' . '/AssessmentDatabase/public/ClassManagement/inspect/' . $class[1] . '/">InspectIcon</a></td>';
                        echo '<td> MarkIcon </td>';
                        echo '<td> <a href="' . '/AssessmentDatabase/public/classmanagement/delete/' . $class[1] . '/">DELETEICON</a></td>';
                        echo '</tr>';
                    }
                }
            ?>
        </table>
        <br>
        <a href="/AssessmentDatabase/public/classmanagement/create/">Create new class</a>


    </body>
</html>

