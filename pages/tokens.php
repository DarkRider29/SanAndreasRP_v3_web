<!--
	pages/home.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	if(isConnected())
	{
		$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
		$dStats = mysqli_fetch_array($req);
		
		$succes=0;
		$error=0;
		$_SESSION['Refresh']=0;
		
		if(!isset($_SESSION['Tokens']))
			{$_SESSION['Tokens']=0;}
		
		if(isset($_POST['tokens']))
		{
			if($dStats['Connected'] == 0)
			{
				$points = 100;
				$ident=$idp=$ids=$idd=$codes=$code1=$code2=$code3=$code4=$code5=$datas='';
				$idp = 70188;
				// $ids n'est plus utilisé, mais il faut conserver la variable pour une question de compatibilité
				$idd = 146281;
				$ident=$idp.";".$ids.";".$idd;
				if(isset($_POST['code1'])) $code1 = $_POST['code1'];
				if(isset($_POST['code2'])) $code2 = ";".$_POST['code2'];
				if(isset($_POST['code3'])) $code3 = ";".$_POST['code3'];
				if(isset($_POST['code4'])) $code4 = ";".$_POST['code4'];
				if(isset($_POST['code5'])) $code5 = ";".$_POST['code5'];
				$codes=$code1.$code2.$code3.$code4.$code5;
				if(isset($_POST['DATAS'])) $datas = $_POST['DATAS'];
				$ident=urlencode($ident);
				$codes=urlencode($codes);
				$datas=urlencode($datas);

				$get_f=@file("http://script.starpass.fr/check_php.php?ident=$ident&codes=$codes&DATAS=$datas");
				if(!$get_f)
				{
					exit("Votre serveur n'a pas accès au serveur de StarPass, merci de contacter votre hébergeur.");
				}
				$tab = explode("|",$get_f[0]);

				if(substr($tab[0],0,3) != "OUI")
					{$_SESSION['Tokens']=1; $_SESSION['Refresh']=1; header ('Location: index.php?p=tokens');}
				else
				{
					mysqli_query($bdd,"UPDATE lvrp_users SET Tokens = Tokens + $points, Dons=Dons+1 WHERE Name = '".$_SESSION['login']."'");
					$_SESSION['Tokens']=2; $_SESSION['Refresh']=1;
					$ip = $_SERVER["REMOTE_ADDR"];
					mysqli_query($bdd,"INSERT INTO `lvrp_site_tokens` SET SQLid='".$dStats['id']."', Date=UNIX_TIMESTAMP(), Reason='+ 100', Ip='".$ip."'");
					header ('Location: index.php?p=tokens');
				}
			}
		}
		
		$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
		$dStats = mysqli_fetch_array($req);
?>
	<div class="top">Boutique  »  Tokens</div>
	<div class="contain">
		<div class="menu">
			<center>
			<a href="index.php?p=shop">Conditions générales de vente</a> 
			<a href="index.php?p=vip">Pack Vip</a> 
			<a href="index.php?p=packs">Hors Pack</a> 
			<a href="index.php?p=tokens">Tokens</a> 
			<a href="index.php?p=market">Marché</a> 

			</center>
		</div>
		<br/>
		<div class="box_orange"><center>Vous disposez de <b><?php echo number_format($dStats['Tokens'],1); ?></b> tokens.</center></div>
		<?php
			if($dStats['Connected'] == 1)
				{echo '<div class="box_warning"><center>Vous devez être déconnecté du serveur pour effectuer un achat !</center></div>';}
			if($_SESSION['Tokens'] != 0 && $_SESSION['Refresh']==0)
			{
				if($_SESSION['Tokens'] == 1)
					{echo '<div class="box_warning"><center>Le code est invalide !</center></div>'; $_SESSION['Tokens']=0;}
				if($_SESSION['Tokens'] == 2)
					{echo '<div class="box_vert"><center>Vous avez été crédité de 100 tokens.</center></div>'; $_SESSION['Tokens']=0;}
			}
		?>
		
		<center>
		<br/>
		L'achat de points vous permettra de gagner  <a><b>100</b></a> Tokens.<br />
		
		Les micropaiements s'effectue par <a href="http://www.starpass.fr/" target="_blank">StarPass™</a>, éditée par <a href="http://www.bdmultimedia.fr/" target="_blank">BD Multimédia</a><br /><br />

            <b>Pour obtenir vos codes d'accès :</b><br /><br />

		Veuillez cliquer sur l'image pour obtenir le numéro<br /><br />

			<?php echo '<a onclick="window.open(this.href,\'StarPass\',\'width=700,height=500,scrollbars=yes,resizable=yes\');return false;" href="./allopass/achat.php"><img class="aImg" src="./allopass/starpass.png"/></a>'; ?>

			<br/><br/>

            <form method="post" action="index.php?p=tokens">

			<fieldset>

			<legend>Entrer votre code ci-dessous</legend>
				<br/>
              <div><label><input class="input-xlarge" type="text" name="code1" placeholder="Inserer le code ici" maxlength="8" /></label></div>
				<br/>
			  <button class="buton_g" value="Login" type="submit" name="tokens" value="Envoyer">Envoyer</button></span>
			  </fieldset>

            </form>
			<br/><br/>
			<font color="red">Les payements PayPal ne sont pas instantanés ! Livraison sous 24 heures. </font>

			<br/><br/>

			Afin d'éviter de vous faire perdre de l'argent en payant par CB/PayPal sur starpass, nous avons décidé d'accepter les dons par Paypal.

			<br/><br/>Sachez que <b>2 €</b> = <b>100</b> tokens.<br/><br/>

			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_bank">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="U48K39Q88AWG4">
			<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
			<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
			</form>

		</center>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>