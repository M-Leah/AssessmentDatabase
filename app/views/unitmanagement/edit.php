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

        <?= $data['unitName'][0]['unit_name']; ?>
        <br><br>

        <div class="center-block text-center">

            <table class="table-bordered table-responsive">
            <tr>
                <td>Strand ID</td>
                <td>Strand Description</td>
                <td>Remove Strand</td>
            </tr>
            <?php
                foreach ($data['strandDetails'] as $strand)
                {
                    echo '<tr>';
                    echo '<td>' . $strand[0]['strand_id'] . '</td>';
                    echo '<td>' . $strand[0]['strand_description'] . '</td>';
                    echo '<td> <a href="#"><span class="glyphicon glyphicon-remove"> </span></a></td>';
                    echo '</tr>';
                }
            ?>
            </table>

            <br><br>

            Add New Strands
            <form action="" method="POST">
                <select name="strands">
                    <option value="0"> </option>
                    <option value="1">Computer Science</option>
                    <option value="2">Information Technology</option>
                    <option value="3">Digital Literacy</option>
                </select>
                <input type="submit" value="Load Strands">
            </form>

            <br>


            <?php  if ($data['strandReference'] != null) { ?>

            <table class="table-bordered table-responsive">
                <tr>
                    <td>Strand ID</td>
                    <td>Strand Description</td>
                    <td>Add Strand</td>
                </tr>

                <?php


                        foreach ($data['strandReference'] as $strand) {
                            echo '<tr>';
                            echo '<td>' . $strand['strand_id'] . '</td>';
                            echo '<td>' . $strand['strand_description'] . '</td>';
                            echo '<td> <a href="#"><span class="glyphicon glyphicon-plus"> </span></a></td>';
                            echo '</tr>';
                        }

                    }

            ?>
            </table>

            <br><br>
            <a href="/AssessmentDatabase/public/UnitManagement/">Back to Unit Management</a>
        </div>

    </body>
</html>
