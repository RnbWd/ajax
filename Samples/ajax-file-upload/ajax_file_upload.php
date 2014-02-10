<!DOCTYPE html>
<html>
	<head>
		<!-- <link href="fileuploader.css" rel="stylesheet" type="text/css"/> -->
		<script src="http://code.jquery.com/jquery-latest.js"></script>
	</head>
	<body>
		<form id="boxpost" action="process.php" enctype="multipart/form-data" accept-charset="utf-8" method="post">
		<input type="file" name="media[]" />
		<input type="file" name="media[]" />
		<input type="text" name="share" value="1" />
		<input type="text" name="message" value="Hello" />
		<input type="text" name="emails[]" value="test@domain.com" />
		<input type="text" name="emails[]" value="test1@domain.com" />
		<input type="submit" name="upload_files" value="Upload File" />
		</form>

	</body>	

	<script type="text/javascript">
		$(document).ready(function(){

		$('#boxpost').submit(function(){
			
			var fn_data = new FormData($('input[name^="media"]'));

			jQuery.each($('input[name^="media"]')[0].files, function(i, file) {
			    fn_data.append('file-'+i, file);
			});

        	$.ajax({
			    url: '/process.php',
			    data: fn_data,
			    cache: false,
			    contentType: false,
			    processData: false,
			    type: 'POST',
			    success: function(data){
			        alert(data);
			    }
			});

			return false;

		});

	}); //close of jquery
	</script>


</html>