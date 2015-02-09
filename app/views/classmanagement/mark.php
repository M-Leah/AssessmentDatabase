Class Management > Mark

<?= $data['className'] . '<br>'; ?>
<?= $data['identifier']; ?>

<table>
    <tr>
        <td>Student Name</td>
        <td>Unit Name</td>
        <td>Assess Criteria</td>
        <td>Overall Comment</td>
    </tr>

<?php
    foreach ($data['students'] as $student)
    {
        echo '<tr>';
        echo '<td>' . $student['student_name'] . '</td>';
        echo '<td>' . 'tbd' . '</td>';
        echo '<td>LINKHERE</td>';
        echo '<td><textarea rows="3" cols="10"></textarea></td>';
        echo '</tr>';
    }
?>
</table>
<input type="submit" value="Update Comments">
<a href="/AssessmentDatabase/public/ClassManagement/assess/<?=$data['className'];?>">Back</a>