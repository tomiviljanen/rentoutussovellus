<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" href="font-awesome
/css/font-awesome.min.css">
<title></title>
</head>
<body>
<script>
var audio = new Audio;
function set(src){ audio.src = src; }
function play() { 	audio.play();
					document.getElementsByClassName('play')[0].style.display='none';
					document.getElementsByClassName('pause')[0].style.display='initial';
				}
function pause() { 	audio.pause(); 
					document.getElementsByClassName('pause')[0].style.display='none';
					document.getElementsByClassName('play')[0].style.display='initial';
				}
				
function stop(){audio.pause();
				audio.currentTime = 0;
				document.getElementsByClassName('pause')[0].style.display='none';
				document.getElementsByClassName('play')[0].style.display='initial';}

</script>
<?php
//Start session
session_start();
//If there is no userid(meanning no login info) redirect back to login page
if(empty($_SESSION['userid']))
    {
    header('Location:login.php');;
    }else{
?>
<div id="header">
<div id="nav">
<ul>
	<li>Äänitegalleria</li>
	<li>Kauppa</li>
	<li>Info</li>

</div>
<div id="userinfo">
	<div id="username">
		<h3><?php echo ucfirst($_SESSION["firstname"]) . " " . ucfirst($_SESSION["surname"]) . " "; ?></h3>
	</div>
	<div id="menubutton">
		<span class="fa fa-angle-down" id="icons" aria-hidden="true"></span>
	</div>
</div>
</div>


<div id="audioplayer">
<div id="media-buttons" class="backward" onClick="backward()"><span class="fa fa-backward"></span></div>
<div id="media-buttons" class="play" onClick="play()"><span class="fa fa-play"></span></div>
<div id="media-buttons" class="pause" style="display: none;" onClick="pause()"><span class="fa fa-pause"></span></div>
<div id="media-buttons" class="stop" onClick="stop()"><span class="fa fa-stop"></span></div>
<div id="media-buttons" class="forward" onClick="forward()"><span class="fa fa-forward"></span></div>
<?php
    $xml = simplexml_load_file('aanitteet/aanite.xml');
 
    echo "Nimi:" . $xml->nimi


?>
<button onClick="set('https://incompetech.com/music/royalty-free/mp3-royaltyfree/Thief%20in%20the%20Night.mp3')">Set sound</button>




</div>
<?php
}
?>
</body>
</html>