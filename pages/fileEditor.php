<!-- HTML edited by Paul Court php written by Keshav Singhal -->
<html>
 <meta name="author" content="Keshav Singhal">
 <meta name="description" content="This page allows the user to edit and submit an SRS document.">

  <head>
	<title>SE 640 Semantic Analysis Project SRS Editor</title>
	<link rel="stylesheet" href="stylesheet.css">
  </head>
  
<body bgcolor = "#ffffff">
<font size = "+2"> Edit the text and click <b>Submit</b> or <b>Reset</b> when finished!</font>
<br><br>

<?php

// configuration
$FileName= $_GET['fileName'];
$file = "./uploads/$FileName";
$url = "fileEditor.php?fileName=$FileName";


// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    file_put_contents($file, $_POST['text']);

    // redirect to form again
    header(sprintf('Location: %s', $url));
    printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>

<!-- HTML form -->
	<form action="" method="post">
		<textarea name="text" rows = "40%" cols = "100%"><?php echo htmlspecialchars($text) ?></textarea>
		<input type="submit" />
		<input type="reset" />
	</form>
	
</body>
</html>
