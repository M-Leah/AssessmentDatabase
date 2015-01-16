<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        ClassManagement / View.

        <br><br>

        ClassList (WIP) <br>

        <?php

            foreach($data['students'] as $student) {
                echo $student[0] . ' ';
                echo $student[1] . ' ';
                echo $student[2] . ' ';
                echo $student[3] . ' ';
                echo '<br>';
            }



        ?>
    </body>
</html>