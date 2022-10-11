<?php 
ob_start("ob_gzhandler");
include "middleware.php";
ini_set("post_max_size", "500M");
if (isset($_POST["submit"])) {
	$file = $_FILES["file"];
	$fN = $_FILES["file"]["name"];
	$fS = $_FILES["file"]["size"];
	$fT = $_FILES["file"]["type"];
	$fTmp = $_FILES["file"]["tmp_name"];
	$fE = $_FILES["file"]["error"];
	$fExt = explode(".", $fN);
	$fAe = strtolower(end($fExt));
	$allow = array("jpg", "jpeg", "png", "exe", "jar", "pdf", "pptx", "docx", "java", "php", "html", "css", "js", "jsx", "tsx", "ts", "ico", "webp", "mcaddon", "mcpack", "phar", "py", "sql", "sqlite", "mysql", "c", "cpp", "cs", "astro", "zig", "go");
	if (in_array($fAe, $allow)) {
		if ($fE === 0) {
			if ($fS < 50000000) {
				$fNN = uniqid(rand(1, 23), false). ".". $fAe;
				$fDest = "upload/{$fNN}";
				move_uploaded_file($fTmp, $fDest);
				$we = pathinfo($fNN, PATHINFO_FILENAME);
				$fp = fopen("share/{$we}", "a");
				fwrite($fp, "<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>{$we} | ReplShare</title>
	<link rel='stylesheet' href='../file.css'>
	<script src='https://kit.fontawesome.com/e4d71b6741.js' crossorigin='anonymous' defer></script>
</head>
<body>
	<main>
		<h1>ReplShare</h1>
		<p>This file may be dangerous do you still want to download it?</p>
		<a href='../upload/{$fNN}' download>Click to download file</a>
	</main>
</body>
</html>");
			print "<script>location.href='share/{$we}'</script>";
			} else {
				print 'Your file is too big';
			}
			
		} else {
			print 'Oops, your file returned an error, please try again later.';
		}
	} else {
		print 'This file is not allowed, please DM xnotkingdev_#6824 or change the extension.';
	}
	#print_r($file);
} else {
	echo "No further info";
}
ob_end_flush();
?>