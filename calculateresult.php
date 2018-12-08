<?php
  include('ahp.php');
  $result = calculateSecore($_SESSION['username'],$_SESSION['courseID']);
  echo 'The calculated score from backend algorithm is' . $result . '';
?>