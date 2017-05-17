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
		
		if(!isset($_SESSION['timeVote']))
			{$_SESSION['timeVote']=0;}
		
		if(isset($_POST['voter']))
		{
			$date = time();
			$ecartminute = ($date - $dStats['HasVoted1'])/60;
			if ($ecartminute > 120)
			{
				$tokens = $dStats['Tokens'] +1;
				$vote = $dStats['Votes'] +1 ;
				mysqli_query($bdd,'UPDATE lvrp_users SET Tokens ='.$tokens.', HasVoted1 = '.$date.', Votes = '.$vote.' WHERE id = '.$_SESSION['id'].' ');
				echo"
				<script type='text/javascript'>
				window.location.replace('http://www.root-top.com/topsite/gta/in.php?ID=2382');
				</script>";
				$_SESSION['timeVote']=0;
			}
			else
			{
				$_SESSION['timeVote'] = round(120 - $ecartminute, 0);
				$_SESSION['Refresh']=1;
				header ('Location: index.php?p=vote');
			}
		}
?>
	<div class="top">Mon compte  »  Voter</div>
	<div class="contain">

		<?php
			if($_SESSION['timeVote'] != 0 && $_SESSION['Refresh']==0)
			{
				echo '<div class="box_warning"><center>Vous devez attendre '.$_SESSION['timeVote'].' minutes avant de pouvoir voter à nouveau !</center></div>';
				$_SESSION['timeVote']=0;
			}
		?>
		<hr />
		<center><big>Voter pour le serveur à comme but de nous faire progresser et d'assurer sa continuité.<br />
		Grâce à vos votes, vous verrez vos points accroître d'un token par vote.<br />
		Vous avez la possibilité de pouvoir voter une fois toutes les 2 heures.</big></center>
		<hr />
		<div class="box_warning"><center>Si vous ne remplissez pas le captcha, vous serrez bannis 24H et vos tokens vous serront retirer !</center></div>
		<h3> Vos statistiques : </h3>
		<li> Vous avez effectué : <b> <?php echo $dStats['Votes']; ?> votes </b></li><br />
		<li> Vous avez : <b><?php echo number_format($dStats['Tokens'],1);?> Tokens</b> <small><a href="?p=tokens"> En obtenir d'avantage</small> </a></li></b>
		
		
		<br /><div class ="alert alert-info"><b>Comment voter ?</b>
		 Il vous suffit de cliquer sur le bouton voter juste en dessous ! <br /></div>
		 <br />
		 <form method="post" action="index.php?p=vote">
			  <center><button class="buton_g" value="Login" type="submit" name="voter" value="Voter">Voter</button></center>
         </form>
		</p>
		
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>