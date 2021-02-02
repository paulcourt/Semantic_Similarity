<!-- HTML edited by Paul Court php written by Keshav Singhal -->
<html>
 <meta name="author" content="Keshav Singhal">
 <meta name="description" content="This page allows the user to upload a document from a chosen directory and 
 stores it into the local directory named 'uploads'.">

  <head>
	<title>SE 640 Semantic Analysis Project</title>
	<link rel="stylesheet" href="stylesheet.css">
  </head>
  
<body bgcolor = "#ffffff">

<?php
error_reporting(0);
    $currentDirectory = getcwd();
    $uploadDirectory = "/uploads/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['txt', 'pdf']; // These will be the only file extensions allowed 

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a txt or pdf file.  ";
      }

      if ($fileSize > 10000000) {
        $errors[] = "File exceeds maximum size (10MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded.  ";
        } else {
          echo "An error occurred. Please contact the administrator.  ";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "Sorry for the incconvenience." . "\n";
        }
      }

    }
?>

<!-- HTML form -->

<form action="uploadDoc.php" method="post" enctype="multipart/form-data">
        <font size = "+2">Click <b>Chose File</b> to upload a new document then <b>Upload</b>:</font><br><br>
        <input type="file" name="the_file" id="uploadDoc">
		<br><br>
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>
