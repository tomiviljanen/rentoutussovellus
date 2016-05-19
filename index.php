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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script>
var audio = new Audio;
audio.src = "aanitteet/testi.mp3"
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



window.setInterval(function(){
	var getcurrentProgress = audio.currentTime;
	var duration = audio.duration;
	var currentProgress = getcurrentProgress / duration * 100;
	var durationMin = Math.floor(duration / 60);
	var durationSec = Math.floor(duration - durationMin * 60);
	var progressMin = Math.floor(getcurrentProgress / 60);
	var progressSec = Math.floor(getcurrentProgress - progressMin * 60);
	document.getElementById("currentprogress").style.width= currentProgress + "%";
	document.getElementById("currentProgressText").innerHTML = progressMin + ":" + progressSec;
	document.getElementById("durationText").innerHTML = durationMin + ":" + durationSec;
	
}, 100);

window.setInterval(function(){
	var volume = document.getElementById("volumeSlider").value / 100;
	audio.volume = volume;
	
}, 100);

function openVolumeSlider(){
	document.getElementById("slidercontainer").style.display = 'table';
	document.getElementsByClassName('openbutton')[0].style.display = 'none';
	document.getElementsByClassName('closebutton')[0].style.display = 'initial';
}

function closeVolumeSlider(){
	document.getElementById("slidercontainer").style.display = 'none';
	document.getElementsByClassName('openbutton')[0].style.display = 'initial';
	document.getElementsByClassName('closebutton')[0].style.display = 'none';
}

function muteSound(){
	audio.muted = true;
	document.getElementsByClassName('mutebutton')[0].style.display = 'none';
	document.getElementsByClassName('unmutebutton')[0].style.display = 'table-cell';
}

function unmuteSound(){
	audio.muted = false;
	document.getElementsByClassName('mutebutton')[0].style.display = 'table-cell';
	document.getElementsByClassName('unmutebutton')[0].style.display = 'none';
}

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
<div id="media-buttons" class="backward" onClick="backward()"><span class="fa fa-backward" id="icons" aria-hidden="true"></span></div>
<div id="media-buttons" class="play" onClick="play()"><span class="fa fa-play" id="icons" aria-hidden="true"></span></div>
<div id="media-buttons" class="pause" style="display: none;" onClick="pause()"><span id="icons" class="fa fa-pause"></span></div>
<div id="media-buttons" class="stop" onClick="stop()"><span id="icons" class="fa fa-stop" aria-hidden="true"></span></div>
<div id="media-buttons" class="forward" onClick="forward()"><span id="icons" class="fa fa-forward" aria-hidden="true"></span></div>
<div id="volume">
<div id="media-buttons" class="openbutton" onclick="openVolumeSlider()"><span id="icons" class="fa fa-volume-up" aria-hidden="true"></span></div>
<div id="media-buttons" class="closebutton" style="display: none;" onclick="closeVolumeSlider()"><span id="icons" class="fa fa-volume-off" aria-hidden="true" ></span></div>
	<div id="slidercontainer">
		<div id="media-buttons" class="mutebutton" onclick="muteSound()"><span id="icons" style="display:table-cell; text-align:center;" class="fa fa-volume-up"></span></div>
		<div id="media-buttons" class="unmutebutton" onclick="unmuteSound()"><span id="icons" style="display:none; text-align:center; class="fa fa-volume-up"></span></div>
		<input id="volumeSlider" type="range" min="0" max="100" value="50"></input>
	</div>
</div>
<?php
    $xml = simplexml_load_file('aanitteet/aanite.xml');
 
    echo "<h3 id=\"songname\">" . $xml->nimi . "</h3>";


?>


<div id="progressbar" class="progressbar">
<div id="currentprogress"></div>
</div>
<div id="progresstext">
	<span id="currentProgressText">00:00</span>
	<span>/</span>
	<span id="durationText">00:00</span>
</div>




</div>
<?php
}
?>
</body>
</html>