
<?php
  require 'includes/app.php';

  session_start();
  $_SESSION = [];
  
  header('location:' .BASE_URL);
?> 