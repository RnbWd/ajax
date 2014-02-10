<?php

    $query = "SELECT * FROM posts ORDER BY id DESC;";
    $notes = fetch_all($query);
    $posts = array();
    foreach($notes as $note)
      {
        //SCRIPT IS NEEDS TO BE LOADED FOR EACH ELEMENT!!
        $posts[] = ("
            <div class = 'note'>
            <form class='delete' action ='process.php' method='post'>
            <input type='hidden' name='id_d' value ='".$note['id']."' />
            <h6>".$note['title']."</h6>
            <input class = 'kill' type='image' src='redX2.png' alt='submit' width='10 height='10' />
            </form>
            <form class='edit' action ='process.php' method='post'>
            <input type='hidden' name='id_e' value='".$note['id']."' />
            <p>".$note['description']."</p></form></div>");
      }
      
      $join = implode(" ", $posts);
  
  ?>