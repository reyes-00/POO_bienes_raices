<?php

function conectarDB()
{
  $db = new mysqli('localhost', 'root', '', 'app_salon');

  if (!$db) {
    echo "Error";
    exit;
  }

  return $db;
}
