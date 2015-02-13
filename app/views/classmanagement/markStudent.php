<link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
<link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
<link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/AssessmentDatabase/public/css/tables.css">
</head>
<body>

<h1 class="main_title">Mark <?= $data['studentName']; ?></h1>

<div class="center-block text-center">

    <?php
    // test
    // Temporary Solution for choosing previously selected lights
    $light = [];

    foreach ($data['studentDetails'] as $detail) {
        switch ($detail['trafficlight']) {
            case '':
                $light[] = '<select name="'. $detail['assessment_id'] .'"><option value="0" selected></option>
                <option value="1">Red</option>
                <option value="2">Amber</option>
                <option value="3">Green</option></select>';
                break;
            case 'Red':
                $light[] = '<select name="'. $detail['assessment_id'] .'"><option value="0"></option>
                <option value="1" selected>Red</option>
                <option value="2">Amber</option>
                <option value="3">Green</option></select>';
                break;
            case 'Amber':
                $light[] = '<select name="'. $detail['assessment_id'] .'"><option value="0"></option>
                <option value="1">Red</option>
                <option value="2" selected>Amber</option>
                <option value="3">Green</option></select>';
                break;
            case 'Green':
                $light[] = '<select name="'. $detail['assessment_id'] .'"><option value="0"></option>
                <option value="1">Red</option>
                <option value="2">Amber</option>
                <option value="3" selected>Green</option></select>';
                break;
            default:
                $light[] = '<select name="'. $detail['assessment_id'] .'"><option value="0" selected></option>
                <option value="1">Red</option>
                <option value="2">Amber</option>
                <option value="3">Green</option></select>';
                break;

        }
    }
    ?>

    <br>


    <table class="table-bordered table-responsive">
        <tr>
            <td>Strand ID</td>
            <td>Strand Description</td>
            <td>Traffic Light</td>
            <td>Comment</td>
        </tr>
        <form action="" method="POST">
        <?php
        $count = 0;
            foreach ($data['strandArray'] as $detail)
            {
                echo '<tr>';
                echo '<td>' . $detail[0]['strand_id'] . '</td>';
                echo '<td>' . $detail[0]['strand_description'] . '</td>';
                echo '<td>' . $light[$count] . '</td>';
                echo '<td><textarea rows="2" cols="15" name="comment_' . $count . '">' . $data['studentDetails'][$count]['comment'] . '</textarea></td>';
                echo '</tr>';
                $count++;

            }
        ?>


    </table>

    <input type="submit" value="Update Assessment">
    </form>

    <br>
    <br>


    <a href="/AssessmentDatabase/public/classmanagement/mark/<?= $data['className']; ?>/<?= $data['identifier'] ?>/">Back</a>
</div>

</body>
</html>