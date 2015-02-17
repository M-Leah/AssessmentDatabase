Report Management > Levels
<br><br>
<?php

    $count = 0;
    foreach($data['scores'] as $score) {
        echo $score['student_name'] . ' ' . $score['score'] . ' ' . $data['levels'][$count]['level'] . '<br>';
    }


?>