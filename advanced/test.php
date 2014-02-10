<?php
function edit($data,$id)
  {
    echo  "INSERT INTO posts (description, updated_at) VALUES ('".mysql_real_escape_string($data)."', NOW()) WHERE id = '".mysql_real_escape_string($id)."'";
    //mysql_query($query);
  }
  edit("hello",179);
  ?>