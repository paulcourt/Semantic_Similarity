<!-- HTML edited by Paul Court php written by Sharatha Jayakumar -->
<html>
 <meta name="author" content="Sharatha">
 <meta name="description" content="This page allows the user to view the highlighted related requirements from SRS document.">

  <head>
	<title>SE 640 Semantic Analysis Project Highlight Related</title>
	<link rel="stylesheet" href="stylesheet.css">
  </head>
  
<body bgcolor = "#ffffff">
<font size = "+2"> Highlighted Related Requirements </font>
<br><br>


<?php
// configuration
// configuration
$FileName= $_GET['fileName'];
$file = "./uploads/$FileName";
$url = "displayhighlightedSimilar.php?fileName=$FileName";

$tableFileName = "";

if ($FileName == "PGCS_raw.txt")
{
		$tableFileName = "PGCS_Table.txt";
}
elseif ($FileName == "WOW_SRS_Grouped_Edited.txt")
{
		$tableFileName = "WOW_Table.txt";
}
elseif ($FileName == "WOW_SRS_Grouped.txt")
{
		$tableFileName = "graphTable.txt";
}
else
{
	$tableFileName = "graphTable.txt";
}


// read the textfile
$text = file_get_contents($file);
$tableEntries = explode( PHP_EOL, file_get_contents($tableFileName) );

	$result = array(array());

	foreach( $tableEntries as $tableRows ){	
	$tmp1 = preg_split('/\s+/', $tableRows);
      if ((isset($result[$tmp1[0]])) and isset($tmp1[1])) {
		array_push($result[$tmp1[0]],$tmp1[1]);
    } else {
        $result[$tmp1[0]] = array();
		array_push($result[$tmp1[0]],$tmp1[1]);
    }
	}
	//json_encode($result);

?>
<!-- HTML form -->
	<form action="" method="post">
	Select the Requirement to Highlight related requirements: 
    <select name="country" onchange="this.form.submit()">
    <option value="" disabled selected>--select--</option>
	<?php 
		$arrayRows= array();
		foreach( $tableEntries as $tableRows ){	
			$tmp1 = preg_split('/\s+/', $tableRows);
			if(isset($tmp1[0])){
				array_push($arrayRows,$tmp1[0]);
			}
		}
		$arrayRows = array_unique($arrayRows);
		foreach( $arrayRows as $rrows ){	
		echo "<option value=".$rrows.">".$rrows."</option>";
		}

	?> 
    </select> <br> <br>


<?php



	$style = "";

	$lines = explode(PHP_EOL, htmlspecialchars($text));
	 
	 if(isset($_POST["country"])){

    $style = "style='display:none;'";


       $arrIndex=$_POST["country"];
	   $lines = explode(PHP_EOL, htmlspecialchars($text));
		
		echo "Graph Table Entries : ".json_encode($result[$arrIndex]).'<br><br>';
		$count = 1;
		foreach ( $lines as $string => $value) {
			$color="#0";
            $newString=$value.'<br>';
            $String='';
//			echo $count.$result[$arrIndex];
			if (in_array(strval($count), $result[$arrIndex])){
				$color="#ff0000ff";
			} 
			echo '<div class="text"><span style="color:', $color, '">',$newString,'</span></div>';
			$count++;
     }

   }
?>	
	<div class="displayRequirements" <?php echo $style;?>>
  <p><?php 
  	   $lines = explode(PHP_EOL, htmlspecialchars($text));
		
		$count = 1;
		foreach ( $lines as $string => $value) {
            $newString=$value.'<br>';
            $String='';
			echo '<div class="text"><span style="color:', $color, '">',$newString,'</span></div>';
			$count++;
     }?>
  
  </p>                       
<div>

</form>
	
</body>
</html>
