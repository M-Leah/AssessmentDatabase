<link rel="stylesheet" href="/AssessmentDatabase/public/css/header.css">
<link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap.min.css">
<link rel="stylesheet" href="/AssessmentDatabase/public/css/bootstrap_css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/AssessmentDatabase/public/css/tables.css">
</head>
<body>

<h1 class="main_title">Mark <?= $data['studentName']; ?></h1>

<div class="center-block text-center">

    <br>

    <table class="table-bordered table-responsive">
        <tr>
            <td>Strand ID</td>
            <td>Strand Description</td>
            <td>Traffic Light</td>
            <td>Comment</td>
        </tr>
        <?php
            foreach ($data['strandArray'] as $detail)
            {
                echo '<tr>';
                echo '<td>' . $detail[0]['strand_id'] . '</td>';
                echo '<td>' . $detail[0]['strand_description'] . '</td>';
                echo '<td><select>
                        <option value="0"></option>
                        <option value="1">Red</option>
                        <option value="2">Amber</option>
                        <option value="3">Green</option>
                    </select></td>';
                echo '<td><textarea rows="2" cols="15"></textarea></td>';
                echo '</tr>';
            }

        ?>
    </table>

    <br>
    <input type="submit" value="Update Assessment">
    <br>

    <a href="/AssessmentDatabase/public/classmanagement/mark/<?= $data['className']; ?>/<?= $data['identifier'] ?>/">Back</a>
</div>

</body>
</html>