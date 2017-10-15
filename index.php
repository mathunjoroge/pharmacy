<?php
// Connect to MySQL
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

// Make my_db the current database
$db_selected = mysql_select_db('pharmacy_db', $link);

if (!$db_selected) {
  // If we couldn't, then it either doesn't exist, or we can't see it.
  $sql = 'CREATE DATABASE pharmacy_db';

  if (mysql_query($sql, $link)) {
      echo "";
  } else {
      echo 'Error creating database: ' . mysql_error() . "\n";
  }
}


?>
<?php

// Name of the file
$filename = 'pharmacy_db.sql';
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'root';
// MySQL password
$mysql_password = '';
// Database name
$mysql_database = 'pharmacy_db';

// Connect to MySQL server
mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
echo '</br>';
 
 
?>
<script type="text/javascript">function progressbar(percent){
    //var szazalek=Math.round((meik*100)/ossz);
    document.getElementById("szliderbar").style.width=percent+'%';
    document.getElementById("szazalek").innerHTML=percent+'%';
}

var elapsedTime=0;
function timer()
{
if(elapsedTime > 100)
    {
		document.getElementById("szazalek").style.color = "#FFF";
        document.getElementById("szazalek").innerHTML = "Database created, Tables created";
		if(elapsedTime >= 107)
		{
			clearInterval(interval);
			history.go(-1);
		}
    }
	else
	{
		progressbar(elapsedTime);
	}
	elapsedTime++;
    
}

var myVar=setInterval(function(){timer()},100);
</script>
<style type="text/css">#szlider{
    width:100%;
    height:15px;
    border:1px solid #000;
    overflow:hidden; }
#szliderbar{
    width:37%;
    height:15px;
    border-right: 1px solid #000000;
    background: green; }
#szazalek {
    color: #000000;
    font-size: 15px;
    font-style: italic;
    font-weight: bold;
    left: 25px;
    position: relative;
    top: -16px; }</style>
<body onload="drawszlider(121, 56);">
    <div id="szlider">
    <div id="szliderbar">
    </div>
    <div id="szazalek">
    </div>
</div> 
<?php
unlink("index.php");
unlink("pharmacy_db.sql");
 rename("index2.php","index.php"); ?>  
</body>
