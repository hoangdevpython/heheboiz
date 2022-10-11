<?php
ob_start("ob_gzhandler");
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ReplShare</title>
	<script src="https://kit.fontawesome.com/e4d71b6741.js" crossorigin="anonymous" defer></script>
	<link rel="icon" href="replshare.png" type="image/jpg">
	<link rel="stylesheet" href="index.css">
</head>
<body>
    <form method="POST" action="upload.php" enctype="multipart/form-data" class="form">
		<h1>Submit file</h1>
		<div class="f-small">Share > 1GB files.</div>
		<label class="custom-file-upload">
    		<input type="file" name="file"/>
   			<p>Upload file</p>
		</label>
		<button type="submit" name="submit">Send <i class="fas fa-arrow-right"></i></button>
	</form>
</body>
</html>
<?php 
ob_end_flush();
?>