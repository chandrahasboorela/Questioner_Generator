<?php
$to = "crt.imagine@gmail.com";
$subject = "HTML email";

$message = <<<EOL
<html>
<head>
<style>
    .h1{
        color:red;
    }
    </  style>
</head>
<body>
<form action="http://xtremeinvo.com/learn/testpost.php" method='GET'> 
		<h1 style="color:red;">GitHub &amp; BitBucket HTML Preview</h1>
		<p>
			Enter URL of the HTML file to preview:
			<input type="text" id="file" name='id' value="" placeholder="e.g. https://github.com/user/repo/blob/master/index.html" size="60" autofocus>
			<input type="submit" value="Preview">
		</p>
		<p>or prepend to the URL: <code><strong>http://htmlpreview.github.io/?</strong>https://github.com/twbs/bootstrap/blob/gh-pages/2.3.2/index.html</code></p>
		<p id="footer">Developed by <a href="https://github.com/niutech">niu tech</a> | Contribute on <a href="https://github.com/htmlpreview/htmlpreview.github.com">GitHub</a></p>
	</form>
</body>
</html>
EOL;


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";
$headers .= 'Reply-To: webmaster@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>