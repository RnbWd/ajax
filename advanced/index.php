<?php
  require('connect.php');
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <title>Ajax</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

  <script>
    
    $(document).ready(function(){

      var c = 0;

      $(document).on('submit','#add_note,.delete,.edit',function(){
        $.post($(this).attr('action'),$(this).serialize(),function(data){
          c=0;
          $('#wrapper').html(data);
        }, "json");
        return false;
      });

      $(document).on('click','.edit',this,function(){
      
        if (c == 0) {
          var d = $('p',this);
          var b = $("<textarea name='updated' ></textarea>").append(d.contents());
          d.replaceWith(b);
          $('textarea').focus();
          $(this).siblings().children('h6').css({
            "color": "red",
            "margin-left": "18px"
          });
          $(this).siblings().prepend("<img class = 'edit_button' src = 'plus.svg.med.png' width='10 height='10' />");
        }
        
        c = 1;
        $('.edit_button').click(function(){
          $(this).parents().siblings().submit();
          c = 0;
        });
      });
     
        
      
    });
  </script> 
</head>
<body>
  <div id="top">
  <h4>Add a note:</h4>
    <form id="add_note" action="process.php" method="post">
      <input type='text' name="new_note" placeholder="TiTLe" maxlength='12' /input>
      <input type="submit" value="Post It!" />
    </form>
    <h2>My Posts:</h2>
  </div>
  <div id="wrapper">
    <?php 
    require ('notes.php');
    echo $join;
    ?>
  </div>
</body>
</html>