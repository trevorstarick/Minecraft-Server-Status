<?php
/**
 * MC-Server-Status
 * Server Online or Offline
 **/

// Include MC-SS Class
include('MinecraftStatus.class.php');
// Create a new Server Object
$Server = new MinecraftStatus('63.251.20.194');
ob_start();
header('Refresh: 10');
?>
<!DOCTYPE HTML>
<html>
<head>
<link href="stylesheet.css" type="text/css" rel="stylesheet" />
<meta charset="utf-8">
<title><!--TITLE--></title>
<?
if ($Server->Online){echo '<link rel="shortcut icon" type="image/x-icon" href="./online.ico">';}
else {echo '<link rel="shortcut icon" type="image/x-icon" href="./offline.ico">';}
?>
</head>

<body>
<div id="main">
<div id="overlay">
<div id="php">
<h1>STATUS:</h1>
<br />
<?php
#TITLE SETTINGS
if ($Server->Online){$pageTitle = 'Vergecraft is Online';}
else {$pageTitle= 'Vergecraft is Offline';}
#STATUS:
echo '<p>Online: </p>'.($Server->Online ? '<h2>Yes</h2>' : '<h3>No</h3>').'<br>';
#echo 'Message of the day: '.$Server->MOTD.'<br>';
echo '<p>Players online: </p>'.$Server->CurPlayers.' / '.$Server->MaxPlayers;
?>
<br />
<br />
<br />
<h4>Page will refresh automatically every 5-10 seconds depending on how I feel today.</h4>
</div>
</div>
</div>

<h4 id="footer">Designed and programmed by <a href="http://starick.me">Trevor Starick</a>. <a href="http://starick.me/vergecraft/source.zip" style="color: orange">Source code</a></h4>
</body>
</html>
<?
#TITLE SETTINGS
$pageContents = ob_get_contents();
ob_end_clean();
echo str_replace('<!--TITLE-->',$pageTitle,$pageContents);
?>