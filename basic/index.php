<!DOCTYPE html >
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <title>Ajax</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#add_note').submit(function(){
        $.post($(this).attr('action'),$(this).serialize(),function(data){

          $('h1').after("<div class = 'note'>" + data + "</div>");

        }, "json");
        return false;
      });
    });
  </script> 
</head>
<body>
  <h1>My Posts:</h1>
  <div id="add_wrapper">
  <p>Add a note:</p>
    <form id="add_note" action="process.php" method="post">
      <textarea name="new_note" rows="4" cols="30" placeholder="Type Note HEre"></textarea>
      <p><input type="submit" value="Post It!" /></p>
    </form>
  </div>
</body>
</html>