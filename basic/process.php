<?php
  require("connect.php");

  $data = $_POST['new_note'];

  $query = "INSERT INTO posts (description, created_at) VALUES ('".mysql_real_escape_string($data)."', NOW())";

  mysql_query($query);

  echo json_encode($data);
 ?>