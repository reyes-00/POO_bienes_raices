<?php

function conectarDB()
{
  $db = mysqli_connect('localhost', 'root', '', 'app_salon');

  if (!$db) {
    echo "Error";
    exit;
  }

  return $db;
}
