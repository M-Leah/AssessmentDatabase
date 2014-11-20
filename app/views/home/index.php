Viewing -> Home/Index
<br><br>


Your Details are: <br>
<?php
   foreach ($data as $content) {
       echo $content . '<br>';
   }
?>

<br>
<a href="<?php echo '/AssessmentDatabase/public/login/'; ?>">Login!</a>