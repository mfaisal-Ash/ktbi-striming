<?php
  define('DB_NAME', 'db_ktbi_striming');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');
  define('DB_HOST', 'localhost');
  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
  if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error($conn));
  }
  $db_selected = mysqli_select_db($conn, DB_NAME);
  if (!$db_selected) {
    die('Cannot access ' . DB_NAME . ': ' . mysqli_connect_error($conn));
  }
?>