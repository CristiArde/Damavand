<!DOCTYPE html>
<html>
  <head>
  <title>Add Project Phase</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <?php
    $page_content = 'content/modifyPhase_content.php';
    include('master.php');
    ?>
  </body>
</html>
<?php
mysqli_free_result($results);
mysqli_close($connection);
?>