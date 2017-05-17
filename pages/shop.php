<!--
	pages/home.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	if(isConnected())
	{
?>
	<div class="top">Boutique  »  Informations</div>
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
		<fieldset>
		<h2>Conditions générales de Vente</h2>
		<h3>Informations et impactes</h3>
		Les packs VIP et Hors Pack sont mis à votre disposition dans le but de vous récompenser des dons que vous faîtes au serveur et à la confiance que vous lui apporter.<br/>
		Ces dons sont destinés à payer l'hébergement web, le serveur dédié et le vps. En aucun cas ils sont bénéfiques à des fins personnels.<br/>
		<br/><br/>
		Sachez que les packs ne sont pas obligatoires à l'évolution de votre personnage, ils vous permettent des avantages divers n'impactant en aucun cas 
		l'écononomie du serveur. En effet, les véhicules, maisons et garages en vente ont un prix de revente <b>nul</b>.
		<h3>Prix de vente</h3>
		San Andreas RolePlay dispose de sa propre monaie virtuelle local exprimée en <b>tokens</b>, le prix de change en tokens est exprimé sur la page
		d'achat de tokens. En cas d'éventuel changement, vous serez averti par nos moyens de communication.
		<h3>Livraison</h3>
		Les packs vip sont livrés directement après votre achat, assurez-vous d'être déconnecté du serveur avant votre achat.<br/>
		Les différents points de changement et rename se font directement dans le jeu dans une Mairie.<br/>
		Les spawns maison, garage, biz et portails se font par un Administrateur, un fois votre achat effectué, contactez en un.
		<h3>Mode de payement</h3>
		Nous utlisons deux modes de payement, le plus recommandé est <b>StarPass</b> un système de micropayement, l'avantage est que celui-ci vous crédite automatiquement vos tokens.<br/>
		Par ailleur, nous acceptons aussi les payements par <b>PayPal</b>, mais celui-ci n'est pas automatique, ce qui nécessite de préciser votre Prénom_Nom dans le champ de commentaire de payement.
		Les tokens avec le mode de payement PayPal sont crédités en moins de <font color="red">24h</font>.
		<h3>Tentative de fraude</h3>
		Toute personne soupçonnée de fraude envers l'un des modes de payement se verra être sanctionnée lourdement, allant du <b>ban temporaire au ban permanent</b>. 
		Tous les biens soupçonnés d'être achetés de façon illégale se veront être supprimés par le staff.
		<h3>Remboursement</h3>
		Avant d'effectuer un achat ou un changement de monaie réelle en monaie virtuelle, tout utilisateur s'engage à avoir lu et accepté les conditions de vente.
		En cas contraire, la personne ne sera pas remboursée.<br/></br>
		Nous effectuons des remboursements <b>uniquement en tokens</b> en cas d'erreur 404, 403 et 402.<br/>
		Afin d'avoir des preuves, il est fortement conseillé de prendre une capture d'écran lors de l'affichage de l'erreur.
		<h3>Attitude en jeu</h3>
		Le fait d'avoir participé au financement du serveur ne vous permet pas de faire ce que bon vous chante ! Les règles s'appliquent à tout le monde
		et sont les même, en cas de non respect de celles-ci, le staff se réserve le droit de sanctionner l'utilisateur.
		<br/><br/>
		<center><h4><font color="red">Il est obligatoire d'avoir pris conaissance des conditions de vente avant tout achat !</font></h4></center>
		</fieldset>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>