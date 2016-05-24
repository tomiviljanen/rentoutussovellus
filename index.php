<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- load Jquery-->
<script
	type="text/javascript"
	src="https://code.jquery.com/jquery-2.2.3.min.js"
	integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="
	crossorigin="anonymous">
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- Load Stylesheet for the rest -->
<link rel="stylesheet" type="text/css" href="index.css">
<!-- Load icon font-->
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

<title>Rentoutussovellus</title>
</head>
<body>
<?php
//Start session
session_start();
//If there is no userid(meaning no login info) redirect back to login page
if(empty($_SESSION['userid']))
    {
	//Redirect to login page
    header('Location:login.php');;
    }else{		
?>

<!-- Työpöyädn navigointi -->
<div id="headerdesktop">
	<div id="nav">
		<ul id="navlist">
			<li>Äänitegalleria</li>
			<li>Kauppa</li>
			<li onclick="openInfo()">Info</li>
	</div>
	<div id="userinfo">
		<div id="username">
			<h3><?php echo ucfirst($_SESSION["firstname"]) . " " . ucfirst($_SESSION["surname"]) . " "; ?></h3>
		</div>
		<div id="menubutton" onClick="userinfoDrop()">
			<span class="fa fa-angle-down" id="icons" aria-hidden="true"></span>
		</div>
	</div>
</div>

<!-- Mobiilin navigointi -->
<div id="headermobile">
	<div id="nav">
		<span class="fa fa-music" aria-hidden="true"></span>
		<a href="https://loistotahti.fi/shop/"><span class="fa fa-shopping-cart" aria-hidden="true"></span></a>
		<span onclick="openInfo()" class="fa fa-info-circle" aria-hidden="true"></span>
		<span onclick="openProfile()" class="fa fa-user" aria-hidden="true"></span>
	</div>
</div>
<div id="drop-userinfo">
	<ul>
		<li onClick="openProfile()">Oma profiili</li>
		<a href="logout.php"<li>Kirjaudu ulos</li></a>
</div>

<!-- Äänitegalleria -->
<div id="aanitegalleria">
</div>

<!-- Käyttäjä profiili -->
<div id="profiili">
<h2>Oma Profiili</h2>

<h4>Nimi: <?php echo ucfirst($_SESSION['firstname']) . " " . ucfirst($_SESSION['surname']) ?></h4>
<h4>Sähköposti: <?php echo $_SESSION['email'] ?></h4>

<h3>Vaihda tietoja</h3>
<div id="userform">
	<form method="post" action="changemail.php">
		<h4>Sähköpostin vaihto</h4>
		<table>
		<tr>
		<th><label for="newmail">Uusi sähköposti:</label></th>
		<td><input id="newmail" name="newmail" type="email"/></td>
		</tr>
		<tr>
		<th><label for="verifymail">Vahvista uusi sähköposti:</label></th>
		<td><input id="verifymail" name="verifymail" type="email" oninput="checkMail(this)"/></td>
		</tr>
		<tr>
		<td colspan="2"	><input type="submit" value="Vaihda sähköposti"></td>
		</table>
	</form>
</div>
<div id="userform" class="bottomform">
	<form method="post" action="changepass.php">
		<h4>Salasanan vaihto</h4>
		<table>
		<tr>
		<th><label for="oldpass">Nykyinen salasana:</label></th>
		<td><input id="oldpass" name="oldpass" type="password" required/></td>
		</tr>
		<tr>
		<th><label for="newpass">Uusi salasana:</label></th>
		<td><input id="newpass" name="newpass" type="password" required/></td>
		</tr>
		<tr>
		<th><label for="verifypass">Vahvista uusi salasana:</label></th>
		<td><input id="verifypass" name="verifypass" type="password" required oninput="check(this)" /></td>
		</tr>
		<tr>
		<td colspan="2"	><input type="submit" value="Vaihda salasana"></td>
		</table>
	</form>
</div>
<script>
//opens my profile
function openProfile(){
	document.getElementById('profiili').style.display = 'initial';
	document.getElementById('infopanel').style.display = 'none';
}

    function check(input) {
        if (input.value != document.getElementById('newpass').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
    function checkMail(input) {
        if (input.value != document.getElementById('newmail').value) {
            input.setCustomValidity('Email Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>
</div>

<div id="infopanel">
<h3>Ohjeet sovelluksen käyttöä varten</h3>
<button class="accordion">Navigointi</button>
<div class="panel"><p>Sovelluksen yläpalkista pystyy navigoimaan eri osiin sovelluksessa. Leveällä näytöllä navigointi näyttää tekstiltä ja kapealla näytöllä navigointi näyttää kuvakkeilta.</p></div>
<button class="accordion">Äänitesoitin</button>
<div class="panel"><p>Äänite soitin on alapalkissa sijaitseva audiosoitin. Äänite soittimella pystyt toistamaan omistettusi äänitteet, joita voit käydä ostamassa kaupasta. Äänite soittimella ohjaimilla pystyt pysäyttämään äänen toiston, jatkaa seuraavaan tai edelliseen äänitteeseen, vaihtaa äänenvoimakkuuttta ja hypätä eri osiin äänitteissä</p></div>
<button class="accordion">Kauppa</button>
<div class="panel"><p>Kaupasta voit ostaa äänitteitä, jotka sitten ilmestyvät äänitegalleriaan. Kaupasta saa hankittua maksullisia ja ilmaisia äänitteitä, joita voi sitten soittaa tässä sovelluksessa.</p></div>
<button class="accordion">Äänitegalleria</button>
<div style="margin-bottom: 150px;" class="panel"><p>Äänitegalleriassa näet kaikki omistettusi äänitteet. Äänitegalleriassa pystyt valitsemaan äänitteen soitettavaksi. Voit suodattaa, etsiä tai järjestellä äänitegalleriassa äänitteen nimen, pituuden ja kategorian perusteella</p></div>
</div>
<script>
function openInfo(){
	document.getElementById('infopanel').style.display = 'initial';
	document.getElementById('profiili').style.display = 'none';
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}
</script>
<div id="audiocontainer">
<div id="imagecover">
<img src="media/imagecovers/testi.jpg" width="75" height="75"></img>
</div>
<audio src="aanitteet/mp3/testi.mp3" id="audioSource">Audio tag not supported on your browser</audio>
<div id="media-buttons" class="backward" onClick="backward()"><span class="fa fa-backward" id="icons" aria-hidden="true"></span></div>
<div id="media-buttons" class="play" onClick="play()"><span class="fa fa-play" id="icons" aria-hidden="true"></span></div>
<div id="media-buttons" class="pause" style="display: none;" onClick="pause()"><span id="icons" class="fa fa-pause"></span></div>
<div id="media-buttons" class="forward" onClick="forward()"><span id="icons" class="fa fa-forward" aria-hidden="true"></span></div>
<div id="media-buttons" class="openbutton" onclick="openVolumeSlider()"><span id="icons" class="fa fa-volume-up" aria-hidden="true"></span></div>
<div id="media-buttons" class="closebutton" style="display: none;" onclick="closeVolumeSlider()"><span id="icons" class="fa fa-volume-up" aria-hidden="true" ></span></div>
<div id="volume">
	<div id="slidercontainer">
		<div id="media-buttons" class="mutebutton" style=" text-align:center;" onclick="muteSound()"><span id="icons"  class="fa fa-volume-up"></span></div>
		<div id="media-buttons" class="unmutebutton" style="display:none; text-align:center;" onclick="unmuteSound()"><span id="icons"  class="fa fa-volume-off"></span></div>
		<input id="volumeSlider" type="range" min="0" max="100" value="50"></input>
	</div>
</div>
<?php
    $xml = simplexml_load_file('aanitteet/aanite1.xml');
 
    echo "<h2 id=\"songname\">" . $xml->nimi . "</h2>";
?>
<br class="responsivebreak">

<div id="progressbar" class="progressbar">
            <canvas id="canvas" height="20" width="500px">
                canvas not supported
            </canvas>
</div>

<div id="progresstext">
	<label for="progressbar" id="currentProgressText">00:00</label>
	<span>/</span>
	<span id="durationText">00:00</span>
</div>


<script>
var audioPlayer = document.getElementById('audioSource');

audioPlayer.addEventListener("timeupdate", progressBar, true); 

var can = document.querySelector('canvas');
canCtx = can.getContext('2d');

$(window).resize(function () {
  width = $(can).parent().width();
  can.width = width;
});

function play() { 	audioPlayer.play();
					document.getElementsByClassName('play')[0].style.display='none';
					document.getElementsByClassName('pause')[0].style.display='initial';
				}
function pause() { 	audioPlayer.pause();
					document.getElementsByClassName('pause')[0].style.display='none';
					document.getElementsByClassName('play')[0].style.display='initial';
				}



function progressBar() { 
	var audioPlayer = document.getElementById('audioSource'); 
	//get current time in seconds
	var elapsedTime = Math.round(audioPlayer.currentTime);
	var elapsedTimeMin = Math.floor(audioPlayer.currentTime / 60);
	var elapsedTimeSec = Math.floor(audioPlayer.currentTime - elapsedTimeMin * 60);
			if (elapsedTimeSec < 10){
		elapsedTimeSec = "0" + elapsedTimeSec;
	}
			if (elapsedTimeMin < 10){
		elapsedTimeMin = "0" + elapsedTimeMin;
	}
	document.getElementById('currentProgressText').innerHTML = elapsedTimeMin + ":" + elapsedTimeSec;
	var durationMin = Math.floor(audioPlayer.duration / 60);
	var durationSec = Math.floor(audioPlayer.duration - durationMin * 60);
	if (durationMin < 10){
		durationMin = "0" + durationMin;
	}
	if (durationSec < 10){
		durationSec = "0" + durationSec;
	}
	document.getElementById('durationText').innerHTML = durationMin + ":" + durationSec;
	//update the progress bar
	if (canvas.getContext) {
		var ctx = canvas.getContext("2d");
		//clear canvas before painting
		ctx.clearRect(0, 0, canvas.clientWidth, canvas.clientHeight);
		ctx.fillStyle = "rgb(255,0,0)";
		var fWidth = (elapsedTime / audioPlayer.duration) * (canvas.clientWidth);
		if (fWidth > 0) {
			ctx.fillRect(0, 0, fWidth, canvas.clientHeight);
		}
	}
}

window.setInterval(function(){
	var volume = document.getElementById("volumeSlider").value / 100;
	audioPlayer.volume = volume;
	
}, 100);

function userinfoDrop(){
	
	if(document.getElementById("drop-userinfo").style.display == 'none'){
	document.getElementById("drop-userinfo").style.display = 'initial';
	}else{
			document.getElementById("drop-userinfo").style.display = 'none';
	}
	}

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
	audioPlayer.muted = true;
	document.getElementsByClassName('mutebutton')[0].style.display = 'none';
	document.getElementsByClassName('unmutebutton')[0].style.display = 'initial';
}

function unmuteSound(){
	audioPlayer.muted = false;
	document.getElementsByClassName('mutebutton')[0].style.display = 'initial';
	document.getElementsByClassName('unmutebutton')[0].style.display = 'none';
}


                //set up mouse click to control position of audio
                canvas.addEventListener("click", function(e) {
                    //this might seem redundant, but this these are needed later - make global to remove these
                    var audioPlayer = document.getElementById('audioSource'); 
                    var canvas = document.getElementById('canvas');            

                    if (!e) {
                        e = window.event;
                    } //get the latest windows event if it isn't set
                    try {
                        //calculate the current time based on position of mouse cursor in canvas box
                        audioPlayer.currentTime = audioPlayer.duration * (e.offsetX / canvas.clientWidth);
                    }
                    catch (err) {
                    // Fail silently but show in F12 developer tools console
                        if (window.console && console.error("Error:" + err));
                    }
                }, true);
            
</script>
</div>
<?php
}
?>
</body>
</html>