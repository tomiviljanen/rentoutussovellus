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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/u/dt/dt-1.10.12/datatables.min.css"/>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
<script type="text/javascript" src="https://cdn.datatables.net/u/dt/dt-1.10.12/datatables.min.js"></script>
<script type="text/javascript" src="jqueryui/jquery-ui.js"></script>
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
include("db.php");
//If there is no userid(meaning no login info) redirect back to login page
if(empty($_SESSION['userid'])){
	//Redirect to login page
    header('Location:login.html');;
}
?>

<!-- Työpöyädn navigointi -->
<div id="headerdesktop">
	<div id="nav">
		<ul id="navlist">
			<li onclick="openGallery()">Äänitegalleria</li>
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
		<span onclick="openGallery()" class="fa fa-music" aria-hidden="true"></span>
		<a href="https://loistotahti.fi/shop/"><span class="fa fa-shopping-cart" aria-hidden="true"></span></a>
		<span onclick="openInfo()" class="fa fa-info-circle" aria-hidden="true"></span>
		<span onclick="openProfile()" class="fa fa-user" aria-hidden="true"></span>
	</div>
</div>


<div id="profile_div">
	<ul>
		<li onClick="openProfile()">Oma profiili</li>
		<li><a href="logout.php"><li>Kirjaudu ulos</li></a>
	</ul>
</div>
<script>
function userinfoDrop(){
	$('#profile_div').toggle("fast");
}

</script>
<!-- Käyttäjä profiili -->
<div id="profiili">
<h2>Oma Profiili</h2>

<h4>Nimi: <?php echo ucfirst($_SESSION['firstname']) . " " . ucfirst($_SESSION['surname']) ?></h4>
<h4>Sähköposti: <?php echo $_SESSION['email'] ?></h4>

<button class="accordion">Vaihda tietoja</button>
<div clasS="panel">
<div id="userform">
	<form method="post" action="changemail.php">
		<h4>Sähköpostin vaihto</h4>
		<table class="logintable">
		<tr>
		<td><label for="newmail">Uusi sähköposti:</label></td>
		<td><input id="newmail" name="newmail" type="email" required/></td>
		</tr>
		<tr>
		<td><label for="verifymail">Vahvista uusi sähköposti:</label></td>
		<td><input id="verifymail" name="verifymail" type="email" oninput="checkMail(this)" required/></td>
		</tr>
		<tr>
		<td colspan="2" rowspan="2" class="buttoncell"><input type="submit" value="Vaihda sähköposti" class="button"></td>
		</tr>
		</table>
	</form>
</div>
<div id="userform" class="bottomform">
	<form method="post" action="changepass.php">
		<h4>Salasanan vaihto</h4>
		<table class="logintable">
		<tr>
		<td><label for="oldpass">Nykyinen salasana:</label></td>
		<td><input id="oldpass" name="oldpass" type="password" required/></td>
		</tr>
		<tr>
		<td><label for="newpass">Uusi salasana:</label></td>
		<td><input id="newpass" name="newpass" type="password" required/></td>
		</tr>
		<tr>
		<td><label for="verifypass">Vahvista uusi salasana:</label></td>
		<td><input id="verifypass" name="verifypass" type="password" required oninput="check(this)" /></td>
		</tr>
		<tr>
		<td colspan="2"	class="buttoncell"><input type="submit" id="password_submit" value="Vaihda salasana" class="button"></td>
		</table>
	</form>
</div>
</div>
<script>
//opens my profile
function openProfile(){
	$('#profiili').show();
	$('#infopanel').hide();
	$('#aanitegalleria').hide();
	userinfoDrop();
}

    function check(input) {
        if (input.value != $('#newpass').val()) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
    function checkMail(input) {
        if (input.value != $('#newmail').val()) {
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
	$('#infopanel').show();
	$('#profiili').hide();
	$('#aanitegalleria').hide();
}

var acc = $(".accordion");

for (var i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}
</script>
<div id="aanitegalleria">
	<table id="aanitetable" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Äänite</th>
                <th>Kategoria</th>
                <th>Pituus</th>
            </tr>
       </thead>
		<tbody style="text-align: center;">
<?php 

//Get email and password with that matches the email that was inputted
$sql = "SELECT aanitteet.nimi, aanitteet.kategoria, aanitteet.kesto, aanitteet.filename FROM users, omistetut_aanitteet, aanitteet WHERE users.user_id = omistetut_aanitteet.user_id AND omistetut_aanitteet.aanite_id = aanitteet.aanite_id";

$result = $con->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
			echo "<tr onclick=\"updateSource('" . $row['filename'] . "', '" . $row['nimi'] . "') \">";
			echo "<td>" . $row['nimi'] . "</td>";
			echo "<td>". $row['kategoria'] . "</td>";
			echo "<td>" . gmdate("i:s" ,$row['kesto']) . "</td>";
			echo "</tr>";
	}
}

?>
		</tbody>		
	</table>
	<script>
$(document).ready(function() {
    $('#aanitetable').DataTable( {
	    "paging":   false,
        "info":     false
} );
} );

function openGallery(){
	$('#infopanel').hide();
	$('#aanitegalleria').show();
	$('#profiili').hide();	
}
</script>
</div>

<div id="audiocontainer">
<div id="imagecover">
<img src="media/imagecovers/testi.jpg" width="75" height="75"></img>
</div>
<audio id="audioSource">Audio tag not supported on your browser</audio>
<div id="media-buttons" class="backward" onClick="backward()"><span class="fa fa-backward" id="icons" aria-hidden="true"></span></div>
<div id="media-buttons" class="play" onClick="play()"><span class="fa fa-play" id="icons" aria-hidden="true"></span></div>
<div id="media-buttons" class="pause" style="display: none;" onClick="pause()"><span id="icons" class="fa fa-pause"></span></div>
<div id="media-buttons" class="forward" onClick="forward()"><span id="icons" class="fa fa-forward" aria-hidden="true"></span></div>
<div id="media-buttons" onclick="toggleVolumeSlider()"><span id="icons" class="fa fa-volume-up" aria-hidden="true"></span></div>
<div id="volume">
	<div id="slidercontainer">
		<div id="media-buttons" class="mutebutton" style=" text-align:center;" onclick="muteSound()"><span id="icons"  class="fa fa-volume-up"></span></div>
		<div id="media-buttons" class="unmutebutton" style="display:none; text-align:center;" onclick="unmuteSound()"><span id="icons"  class="fa fa-volume-off"></span></div>
		<input id="volumeslider"  oninput="changeVolume(this.value)" type="range" min="0" max="100" value="50"></input>
	</div>
</div>


<h2 id="songname">Valitse äänite galleriasta</h2>
<input disabled id="progressbar" oninput="changeTime(this.value)" onchange="changeTime(this.value)" type="range" min="0" max="1000" step="0.1" value="0"/>

<div id="progresstext">
	<label for="progressbar" id="currentProgressText">00:00</label>
	<span>/</span>
	<span id="durationText">00:00</span>
</div>


<script>
var audioPlayer = document.getElementById('audioSource');
audioPlayer.addEventListener("timeupdate", progressBar, true);

function play() {
	if(audioPlayer.src){
		audioPlayer.play();
		$('.play').hide();
		$('.pause').show();
	}
}

function pause() {
	if(audioPlayer.src){
		audioPlayer.pause();
		$('.play').show();
		$('.pause').hide();
	}		
}

function updateSource(input, songname) { 
	var source = "aanitteet/" + input + ".mp3";
	audioPlayer.src = source;
	$('#songname').text(songname);
	audioPlayer.load(); //call this to just preload the audio without playing
	audioPlayer.play(); //call this to play the song right away
	$('.play').hide();
	$('.pause').show();
	$('#progressbar').removeAttr('disabled');
}

function forward(){
	alert(fwdSource);
}	
	

function changeTime(newTime){
	setTime = (newTime * audioPlayer.duration) / 1000
	audioPlayer.currentTime = setTime;
	audioPlayer.play();
	$('.play').hide();
	$('.pause').show();
}	
	
	
function progressBar(){
	
	var minutesElapsed = Math.floor(Math.ceil(audioPlayer.currentTime) / 60);
	var secondsElapsed = Math.floor(Math.ceil(audioPlayer.currentTime) % 60);
	
	if(minutesElapsed < 10) minutesElapsed = "0" + minutesElapsed;
	if(secondsElapsed < 10) secondsElapsed = "0" + secondsElapsed;
	
	$('#currentProgressText').text(minutesElapsed + ":" + secondsElapsed);
	
	if(minutesDuration < 10) minutesDuration = "0" + minutesDuration;
	if(secondsDuration < 10) secondsDuration = "0" + secondsDuration;
	
	var minutesDuration = Math.floor(Math.ceil(audioPlayer.duration) / 60);
	var secondsDuration = Math.floor(Math.ceil(audioPlayer.duration) % 60);
	$('#durationText').text(minutesDuration + ":" + secondsDuration);
	
	
	var elapsedPercent = (audioPlayer.currentTime / audioPlayer.duration) * 1000;
	$('#progressbar').val(elapsedPercent);
}


function changeVolume(volume){
	audioPlayer.volume = volume / 100;
}

function toggleVolumeSlider(){
	$("#slidercontainer").toggle("fast");
}
function muteSound(){
	audioPlayer.muted = true;
	$('.mutebutton').hide();
	$('.unmutebutton').show();
}

function unmuteSound(){
	audioPlayer.muted = false;
	$('.mutebutton').show();
	$('.unmutebutton').hide();
}
</script>
</body>
</html>