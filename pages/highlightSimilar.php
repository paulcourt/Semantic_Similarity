<!-- HTML edited by Paul Court php written by Keshav Singhal -->
<html>
 <meta name="author" content="Keshav Singhal">
 <meta name="description" content="This page will list the uplaoded files available for display or for edit.">

  <head>
	<title>SE 640 Semantic Analysis Project Available Files</title>
	<link rel="stylesheet" href="stylesheet.css">
  </head>
  
<body bgcolor = "#ffffff">

<font size = "+2"> Select a file from the list of available documents to view <b>Highlighted Similar</b> requirements </font>

<table style="width:100%">
  <tr>
    <td><b>Filename</b></td>
    <td><b>Link to Highlight Similar</b></td>
  </tr>
 <tbody>
<?php 
  $files = array_slice(scandir('./uploads/'), 2);
  foreach ($files as $file){
  	echo'<tr>'; 
	echo'<td>'. $file.'</td>';
	echo''." ".'';
	echo''." ".'';
	echo'<td><a href="http://localhost/pages/displayhighlightedSimilar.php?fileName='.$file.'">'."Highlight Similar Requirements".'</a></td>';

	echo'</tr>';
	echo '<br>'; 
    }
?>
 </tbody>
</table>

</body>

</html>
