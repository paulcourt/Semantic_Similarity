<!-- HTML edited by Paul Court php written by Keshav Singhal -->
<html>
 <meta name="author" content="Paul Court">
 <meta name="description" content="This page allows the user to graph an SRS document.">

  <head>
	<title>SE 640 Semantic Analysis Project Graph Creator</title>
	<link rel="stylesheet" href="stylesheet.css">
  </head>
  
<body bgcolor = "#ffffff">




<?php

//Creates a pop-up window with the graph of the semantic similarity from the table of 
//values given in the dummy file.  The dummy file will have to be replaced with the current
//version of the semantic similarity developed from the algorithm and sent to the 
//Graph_LDA_2.0.py file as graph_file_LDA.txt when the link "View Graph" is activated.

// configuration
$FileName= $_GET['fileName'];
$url = "createGraph.php?fileName=$FileName";
$newName = "graph_file_LDA.txt"; 

//Code to assign each table that was manually created to the graph_file_LDA.txt file that would 
//otherwise be created by the code for semantic inspection.  This section should be replaced when 
//the implementation is completed.


if ($FileName == "PGCS_raw.txt")
{
		$oldName = "PGCS_Table.txt";
}
elseif ($FileName == "WOW_SRS_Grouped_Edited.txt")
{
		$oldName = "WOW_Table.txt";
}
elseif ($FileName == "WOW_SRS_Grouped.txt")
{
		$oldName = "WOW_Table.txt";
}
else
{
	$oldName = "originalDummy.txt";
}

copy( $oldName, $newName);

echo "The file passed from previous page is ";
echo $FileName;
echo '<br>';
echo "The semantic similarity table for this file has been saved into ";
echo $newName;
echo '<br>';
echo "The results of the graphical analysis appear below:  ";
echo '<br>';

$output = shell_exec('python Graph_LDA_2.0.py');

//When you exit the graph, the output from the python program is placed in the window for evaluation.
//The output is a bit messy, but that issue can be resolved in the python file.

echo $output;

?>

	
</body>
</html>
