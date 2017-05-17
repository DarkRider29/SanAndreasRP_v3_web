<!--
	pages/home.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
	
	<div class="top">Accueil  »  Nouveautes</div>
	<div class="contain">
<?php

$nbByPages=5; 

$req=mysqli_query($bdd,'SELECT COUNT(*) AS id FROM lvrp_site_news');
$donnees=mysqli_fetch_array($req);
$total=$donnees['id'];
$nbPages=ceil($total/$nbByPages);

if (empty($_GET['page'])) $_GET['page'] = '1';
if (!is_numeric($_GET['page'])) $_GET['page'] = '1';

if(isset($_GET['page']))
{
     $actualPage=intval($_GET['page']);
     if($actualPage>$nbPages)
		{$actualPage=$nbPages;}
}
else
	{$actualPage=1;}
	
$first=($actualPage-1)*$nbByPages; 
?>
		<div id="news">
<?php
$req=mysqli_query($bdd,'SELECT * FROM lvrp_site_news ORDER BY id DESC LIMIT '.$first.', '.$nbByPages.'');
while ($donnees = mysqli_fetch_assoc($req))

{
?>
			<div class="time"><?php echo date('j',$donnees['Date']),date('M',$donnees['Date']); ?></div>
			<div class="title"><?php echo $donnees['Title'];?></div><br/><br/>
			<div class="by">&Eacute;crit par <?php echo $donnees['Autor']; ?></div>
			<div class="in"><?php echo $donnees['Contenu']; ?></div>
			<div class="dotSeparator">&nbsp;</div>
<?php } ?>
		<?php

echo '<div class="in"><a class="end" href="?p=home&page='.($actualPage - 1).'">Précedante < </a></strong>';

for($i=1; $i<=$nbPages; $i++) 
{
     if($i==$actualPage)
		{echo ' <strong class=""> '.$i.'</strong>'; }	
     else 
		{echo '<a href="?p=home&page='.$i.'">'.$i.'</a> ';}
}
echo '&nbsp;<a class="last" href="?p=home&page='.($actualPage + 1).'" title="Page suivante"> > Suivante</a></div>';

?>
		</div>
		<div class="clear">&nbsp;</div>
	</div>
	