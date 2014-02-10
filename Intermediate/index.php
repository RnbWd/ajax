<?php

  require("connect.php")

 ?>
<html>
<head>
  <meta charset="utf-8" />
  <title>Stuff</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
    $(document).ready(function(){

      $('.datepicker').datepicker({ dateFormat: "yy-mm-dd" });
      //text inputs
      $('input').change(function(){
         $.post(
            $('#test').attr('action'),
            $('#test').serialize(),
            function(data){
              $('#results').html(data);
            }, "json");
       }).change();
      $('input').focus(function(){
        $.post(
            $('#test').attr('action'),
            $('#test').serialize(),
            function(data){
              $('#results').html(data);
            }, "json");
      });
      //change page -- DOES NOT COUNT PAGES - aka is not dynamic
      $('#page').change(function(){

          $('select option:selected').each(function(){
            $.post(
            $('#test').attr('action'),
            $('#test').serialize(),
            function(data){
              $('#results').html(data);
            }, "json");
          });
        });
    });
    </script>
    <style>
    ul {
      margin-left: 450px;
    }
    li {
      display: inline;
      border-right: 1px solid black;
      padding-right: 10px;
      padding-left: 10px;
    }
    a {
      text-decoration: none;
    }
    </style>
</head>
<body>

  <form id="test" action="process.php" method="post">
    Name: <input type="text" name="name" />
    From: <input type="text" class="datepicker" name="from_date" value = "2011-01-01"/>
    To: <input type="text" class="datepicker" name="to_date" value = "2013-11-25"/>
    <select id = "page" name = "page_num">
      <option value="0">1</option>
      <option value="10">2</option>
      <option value="20">3</option>
      <option value="30">4</option>
      <option value="40">5</option>
      <option value="50">6</option>
      <option value="60">7</option>
    </select>

  </form>
  
    <div id="results">
    </div>
  
</body>
</html>