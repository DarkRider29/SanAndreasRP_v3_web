<!DOCTYPE HTML>
<!--
	includes/header.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->

<html lang="fr-gb" dir="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8" />
	<meta name="language" content="fr" />
	<meta name="description" content="SA:MP SARP, San Andreas RolePLay, serveur sous ton San Andreas" />
    <meta name="keywords" content="SAMP, SARP, sarp, sa:mp sarp, samp sarp, Sarp, SA-RP, SA:MP SARP, sa-rp, sa rp, sa:mp, gta sarp, san andreas, roleplay, sa-rp, san andreas role play, samp sarp, sa-rp, sa-, GTA, GTA SARP, GTA, sanandreas, rp" />
	<title>GTA SA:MP San Andreas Role Play</title>
	<meta name="robots" content="All" />
    <meta name="copyright" content="SARPfr" />
	<link href="images/icon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="styles/style.css" type="text/css" />
	<link href="includes/slider/themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="includes/slider/themes/1/js-image-slider.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/snow.js"></script>
	<script type="text/javascript">
			window.onload = function(){
				snow.init(10);
			};
	</script>
	<!-- Editeur Texte -->
	<script src="js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<script type="text/javascript">
$(document).ready(function(){
						   		   
	//When you click on a link with class of poplight and the href starts with a # 
	$('a.poplight[href^=#]').click(function() {
		var popID = $(this).attr('rel'); //Get Popup Name
		var popURL = $(this).attr('href'); //Get Popup href to define size
				
		//Pull Query & Variables from href URL
		var query= popURL.split('?');
		var dim= query[1].split('&');
		var popWidth = dim[0].split('=')[1]; //Gets the first query string value

		//Fade in the Popup and add close button
		$('#' + popID).fadeIn().css({ 'width': Number( popWidth ) }).prepend('<a href="#" class="close"><img src="./images/close_pop.png" class="btn_close" title="Fermer la fenêtre" alt="Fermer" /></a>');
		
		//Define margin for center alignment (vertical + horizontal) - we add 80 to the height/width to accomodate for the padding + border width defined in the css
		var popMargTop = ($('#' + popID).height() + 80) / 2;
		var popMargLeft = ($('#' + popID).width() + 80) / 2;
		
		//Apply Margin to Popup
		$('#' + popID).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		//Fade in Background
		$('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
		$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn(); //Fade in the fade layer 
		
		return false;
	});
	
	
	//Close Popups and Fade Layer
	$('a.close, #fade').live('click', function() { //When clicking on the close or fade layer...
	  	$('#fade , .popup_block').fadeOut(function() {
			$('#fade, a.close').remove();  
	}); //fade them both out
		
		return false;
	});

	
});

</script>



<body>
	<!--<script src="./js/cookiechoices.js"></script>
	<script>
	  document.addEventListener('DOMContentLoaded', function(event) {
		cookieChoices.showCookieConsentDialog('Your message for visitors here.',
			'close message', 'learn more', 'http://example.com');
	  });
	</script>-->
	<div id="menu_header">
		<div class="logo">&nbsp;</div>
		<div class="menu">
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="http://forum.sanandreas-rp.fr/" target="_blank">Forum</a></li>
				<?php
				if(isConnected())
				{
					echo'<li><a href="index.php?p=vote">Voter</a></li>
					<li><a href="index.php?p=shop">Boutique</a></li>';
					if(isAdmin())
						{echo '<li><a href="index.php?p=admin">Admin</a></li>';}
				}
				else	
					{echo'<li><a href="http://www.root-top.com/topsite/gta/in.php?ID=2382">Voter</a></li>';}
				
				echo '<li><a href="samp://'.$samp['ip'].':'.$samp['port'].'">Serveur</a></li>
				<li><a href="ts3server://'.$ts3['ip'].':'.$ts3['port'].'">TeamSpeak</a></li>';
				?>
			</ul>
		</div>
			<?php
			if(isset($_POST['logout']) && isset($_SESSION['login']))
			{
				session_unset();
				session_destroy();
				echo '<meta http-equiv="refresh" content="0; URL=#">';
			}
			if (isset($_POST['login']) && isset($_POST['req_password']))
			{
				$logERR=FALSE;
					$req=mysqli_query($bdd,"SELECT Name FROM lvrp_users WHERE Name = '".mysqli_real_escape_string($bdd,$_POST['req_username'])."'");
					$sql = mysqli_fetch_array($req);

					
					$req=mysqli_query($bdd,"SELECT * FROM lvrp_users WHERE Name = '".mysqli_real_escape_string($bdd,$_POST['req_username'])."'");
					$donnees = mysqli_fetch_array($req);
					if ($sql != NULL)
					{
						if (sha1(mysqli_real_escape_string($bdd,$_POST['req_password'])) == $donnees['Pass'])
						{
							$logOK = TRUE;
							$_SESSION['login'] = $donnees['Name'];
							$_SESSION['id'] = $donnees['id'];
							echo '<meta http-equiv="refresh" content="0; URL=#">';
						}
						else
						{
							$logERR = TRUE;
							$logERRMSG = "Votre nom de compte ou mot de passe est incorrect.";
						}

					}
					else
					{
						$logERR = TRUE;
						$logERRMSG = "Votre nom de compte ou mot de passe est incorrect.";
					}
					
					if($logERR == TRUE)
					{
						print($logERRMSG);
					}
			} ?>
			<?php
			if(isConnected())
			{
				echo '
					<div class="session">
							Bienvenue, '.$_SESSION['login'].'
							<br/>
								<form name="logout" method="post" action="#"><a class="buton_g" href="index.php?p=menu">Mon compte</a><input class="buton_g" type="submit" name="logout" id="send" value="Deconnexion" /></form>
						</div>
						';
			}
			else
			{ 
			?>
		<div class="loggin">
			<form name="logon" method="post" action="#">
				<div class="buton">
					<a class="buton_g" href="index.php?p=register">Inscription</a><br/>
					<input class="buton_g" type="submit" name="login" id="send" value="Connexion" /><br/>
				</div>
				<div class="userpass">
					Mot de passe : <br/><input type="password" name="req_password" size="15" maxlength="32" /><br/>
				</div>
				<div class="username">
					Prénom_Nom : <br/><input type="text" name="req_username" size="15" maxlength="30" /><br/>
				</div>
			</form>
			<?php }?>
		</div>
		
	</div>
	</div>
	<div class="separator">&nbsp;</div>
	<div id="container">
		<div id="infos">
			<div class="shout">
				<div class="left"><div class="textpub">Information : </div></div>
				<div class="text">
					<?php
						$tmpId = rand(0,3);
						if($tmpId==0)
						{
							$req = mysqli_query($bdd,"SELECT COUNT(*) FROM lvrp_users_bans");
							$ban = mysqli_fetch_row($req);
							
							$req = mysqli_query($bdd,"SELECT COUNT(*) FROM lvrp_users WHERE Locked = 1");
							$lock = mysqli_fetch_row($req);
							
							echo '<marquee onmouseover="this.stop()" onmouseout="this.start()"><i>Nous avons un total de '.$lock['0'].' comptes bannis dont '.$ban['0'].' IPs y sont comprises.</i></marquee>';
						}
						elseif($tmpId==1)
						{
							$req = mysqli_query($bdd,"SELECT COUNT(*) FROM lvrp_users");
							$users = mysqli_fetch_row($req);
							
							echo '<marquee onmouseover="this.stop()" onmouseout="this.start()"><i>Nous avons un total de '.$users['0'].' comptes enregistrés sur notre serveur.</i></marquee>';
						}
						elseif($tmpId==2)
						{
							$req = mysqli_query($bdd,"SELECT Name FROM lvrp_users ORDER BY Inscription DESC LIMIT 0,1");
							$users = mysqli_fetch_row($req);
							
							echo '<marquee onmouseover="this.stop()" onmouseout="this.start()"><i>Le plus récent membre enregistré est '.$users['0'].'.</i></marquee>';
						}
						elseif($tmpId==3)
						{
							$req = mysqli_query($bdd,"SELECT Name, Votes FROM lvrp_users ORDER BY Votes DESC LIMIT 0,1");
							$users = mysqli_fetch_row($req);
							
							echo '<marquee onmouseover="this.stop()" onmouseout="this.start()"><i>Le meilleur voteur au Root-Top est '.$users['0'].' avec un total de '.$users['1'].' votes.</i></marquee>';
						}
					?>
				</div>
			</div>
			<div class="samp">
				<div class="left">&nbsp;</div>
				<div class="text"><b>
				<?php
					$sampquery = new SampQuery($samp['ip'],$samp['port']);
					if($sampquery->isOnline()) 
					{
						$sinfos = $sampquery->getInfo();
						echo ''.$sinfos['players'].' connecté(s)';
					}
					else
						{echo '<font color="red">Hors Ligne</font>';}
					?>
				</b>
				</div>
			</div>
			<!--<div class="ts">
				<div class="left">&nbsp;</div>
				<div class="text">
				<?php			
				/*include 'includes/TeamSpeak3/TeamSpeak3.php';
				$ts3 = TeamSpeak3::factory("serverquery://serveradmin:UtEfzx5N@127.0.0.1:10011/?server_port=9987");
				if($ts3) 
				{
					echo ''.$ts3->virtualserver_clientsonline.' connecté(s)';
				}
				else
					{echo '<b><font color="red">Hors Ligne</font></b>';}		
				*/?>
				<b><font color="red">Hors Ligne</font></b></div>
			</div>-->
			
		</div>
		<?php if(empty($_GET['p']) || $_GET['p'] == 'home') { ?>
		<div id="divers">
			<div class="slider">
				<div id="sliderFrame">
					<div id="ribbon"></div>
					<div id="slider">
						<img src="includes/slider/images/image-slider-2.png" alt="" />
						<img src="includes/slider/images/image-slider-3.png" alt="" />
						<img src="includes/slider/images/image-slider-4.png" alt="" />
						<img src="includes/slider/images/image-slider-5.png" />
					</div>
				</div>
			</div>
			<div class="social">
				
				<center>
				<a class="twitter-timeline"  href="https://twitter.com/sanandreasRPfr"  data-widget-id="498167612346347521">Tweets de @sanandreasRPfr</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</center>
			</div>
		</div>
		<?php } ?>
		<div id="inSite">
		<div id="aside">