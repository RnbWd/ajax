<?php
  require("connect.php");



  function delete($id)
  {
    $query = "DELETE FROM posts WHERE id = '".mysql_real_escape_string($id)."';";
    mysql_query($query);
    
  }
  function editer($data,$id)
  {
    $query = "UPDATE posts SET description ='".mysql_real_escape_string($data)."', updated_at = NOW() WHERE id = '".mysql_real_escape_string($id)."'";
    mysql_query($query);
  }

  function addNote($data)
  {
    $query = "INSERT INTO posts (title, created_at) VALUES ('".mysql_real_escape_string($data)."', NOW())";
    mysql_query($query);

  }

  function writeNotes()
  {
   require("notes.php");
   return $join;
  }

  if (!isset($_POST))
  {
    echo json_encode(writeNotes());
  }

  if (isset($_POST['new_note']))
  {
     $new = $_POST['new_note'];
     addNote($new);
     echo json_encode(writeNotes());
  }


  if (isset($_POST['id_d']))
  {
    $id = $_POST['id_d'];
    delete($id);
    echo json_encode(writeNotes());
  }

  if (isset($_POST['id_e']))
  {
    $id = $_POST['id_e'];
    $data = $_POST['updated'];
    editer($data,$id);
    echo json_encode(writeNotes());
  }
 

  
 ?>