<?php

var_dump($_FILES);

//put stuff below to move the file to the server
//look into http://www.w3schools.com/php/php_file_upload.asp
//pay attention to the part: move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]); which is the part that moves the file from $_FILES to the actual server
