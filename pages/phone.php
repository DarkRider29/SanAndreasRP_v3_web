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
		
		if(isset($_POST['ok']))
		{
			$name = $dStats['Name'];
			$contact1 = mysqli_real_escape_string($bdd,$_POST['co1']);
			$contact2 = mysqli_real_escape_string($bdd,$_POST['co2']);
			$contact3 = mysqli_real_escape_string($bdd,$_POST['co3']);
			$contact4 = mysqli_real_escape_string($bdd,$_POST['co4']);
			$contact5 = mysqli_real_escape_string($bdd,$_POST['co5']);
			$contact6 = mysqli_real_escape_string($bdd,$_POST['co6']);
			$contact7 = mysqli_real_escape_string($bdd,$_POST['co7']);
			$contact8 = mysqli_real_escape_string($bdd,$_POST['co8']);
			$contact9 = mysqli_real_escape_string($bdd,$_POST['co9']);
			$contact10 = mysqli_real_escape_string($bdd,$_POST['co10']);
			$contact11 = mysqli_real_escape_string($bdd,$_POST['co11']);
			$contact12 = mysqli_real_escape_string($bdd,$_POST['co12']);

			$contactn1 = mysqli_real_escape_string($bdd,$_POST['con1']);
			$contactn2 = mysqli_real_escape_string($bdd,$_POST['con2']);
			$contactn3 = mysqli_real_escape_string($bdd,$_POST['con3']);
			$contactn4 = mysqli_real_escape_string($bdd,$_POST['con4']);
			$contactn5 = mysqli_real_escape_string($bdd,$_POST['con5']);
			$contactn6 = mysqli_real_escape_string($bdd,$_POST['con6']);
			$contactn7 = mysqli_real_escape_string($bdd,$_POST['con7']);
			$contactn8 = mysqli_real_escape_string($bdd,$_POST['con8']);
			$contactn9 = mysqli_real_escape_string($bdd,$_POST['con9']);
			$contactn10 = mysqli_real_escape_string($bdd,$_POST['con10']);
			$contactn11 = mysqli_real_escape_string($bdd,$_POST['con11']);
			$contactn12 = mysqli_real_escape_string($bdd,$_POST['con12']);

			mysqli_query($bdd,"UPDATE `lvrp_users_phones` SET Contact1='".$contact1."', Contact2='".$contact2."', Contact3='".$contact3."', Contact4='".$contact4."', Contact5='".$contact5."', Contact6='".$contact6."', Contact7='".$contact7."', Contact8='".$contact8."', Contact9='".$contact9."', Contact10='".$contact10."', Contact11='".$contact11."',Contact12='".$contact12."' WHERE SQLid= '".$dStats['id']."'");
			mysqli_query($bdd,"UPDATE `lvrp_users_phones` SET Contact_Num1='".$contactn1."', Contact_Num2='".$contactn2."', Contact_Num3='".$contactn3."', Contact_Num4='".$contactn4."', Contact_Num5='".$contactn5."', Contact_Num6='".$contactn6."', Contact_Num7='".$contactn7."', Contact_Num8='".$contactn8."', Contact_Num9='".$contactn9."', Contact_Num10='".$contactn10."', Contact_Num11='".$contactn11."',Contact_Num12='".$contactn12."' WHERE SQLid= '".$dStats['id']."'");

		}
		
		$row2 = mysqli_query($bdd,"SELECT * FROM lvrp_users_phones WHERE SQLid='".$_SESSION['id']."'");
		$row3 = mysqli_fetch_array($row2);

		if($dStats['Operator'] == 0) $dStats['Operator']="Aucun";
		elseif($dStats['Operator'] == 1) $dStats['Operator']="BellSouth";
		elseif($dStats['Operator'] == 2) $dStats['Operator']="AT&T Mobility";
		elseif($dStats['Operator'] == 3) $dStats['Operator']="SBC Communications";
		elseif($dStats['Operator'] == 4) $dStats['Operator']="Verizon Communication";

?>
	<div class="top">Mon compte  »  Mon telephone</div>
	<div class="contain">
		<div class="menu">
			<center>
			<a href="index.php?p=menu">Mon compte</a> 
			<a href="index.php?p=character">Mon personnage</a> 
			<a href="index.php?p=goods">Mes biens</a> 
			<a href="index.php?p=faction">Mon organisation</a> 
			<a href="index.php?p=inventory">Mon sac</a> 
			<a href="index.php?p=phone">Mon téléphone</a>
			<a href="index.php?p=sanctions">Mes sanctions</a> 
			<a href="index.php?p=edit">Préférences</a> 
			</center>
		</div>
		<br/>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Mon téléphone</b></font></td></tr>
			<td align="left" valign="middle">
				<ul><?php echo'
					<li><b>Numéro :</b> ' . $dStats['PhoneNr'] .'</li>
					<li><b>Opérateur :</b> ' . $dStats['Operator'] .'</li>
					<li><b>Temps d\'appel restant :</b> ' . $dStats['PhoneTime'] .'</li>'; ?>
                </ul>
            </td>
		</table>
		<br/>
		<h3>SMS recus</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">
				<thead>
			<tr>
				<th class="center">SMS</th>
				<th class="center">Date</th>
				<th class="center">Numéro</th>
			</tr>
		</thead>
		<?php 
		echo '<tr><td><center>'.$row3['SMS_Received_Msg1'].'</center></td><td><center>'.date("d-m-Y à H:i:s",$row3['SMS_Received_Date1']).'</center></td><td><center>'.$row3['SMS_Received_Num1'].'</center></td></tr>'; 
		echo '<tr><td><center>'.$row3['SMS_Received_Msg2'].'</center></td><td><center>'.date("d-m-Y à H:i:s",$row3['SMS_Received_Date2']).'</center></td><td><center>'.$row3['SMS_Received_Num2'].'</center></td></tr>';
		echo '<tr><td><center>'.$row3['SMS_Received_Msg3'].'</center></td><td><center>'.date("d-m-Y à H:i:s",$row3['SMS_Received_Date3']).'</center></td><td><center>'.$row3['SMS_Received_Num3'].'</center></td></tr>';
		echo '<tr><td><center>'.$row3['SMS_Received_Msg4'].'</center></td><td><center>'.date("d-m-Y à H:i:s",$row3['SMS_Received_Date4']).'</center></td><td><center>'.$row3['SMS_Received_Num4'].'</center></td></tr>';
		echo '<tr><td><center>'.$row3['SMS_Received_Msg5'].'</center></td><td><center>'.date("d-m-Y à H:i:s",$row3['SMS_Received_Date5']).'</center></td><td><center>'.$row3['SMS_Received_Num5'].'</center></td></tr>';
		?>
		</table>
		<hr/>
		<h3>SMS envoyés</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">
				<thead>
			<tr>
				<th class="center">SMS</th>
				<th class="center">Date</th>
				<th class="center">Numéro</th>
			</tr>
		</thead>
		<?php 
		echo '<tr><td><center>'.$row3['SMS_Sent_Msg1'].'</center></td><td><center>'.date("d-m-Y à H:i:s",$row3['SMS_Sent_Date1']).'</center></td><td><center>'.$row3['SMS_Sent_Num1'].'</center></td></tr>'; 
		echo '<tr><td><center>'.$row3['SMS_Sent_Msg2'].'</center></td><td><center>'.date("d-m-Y à H:i:s",$row3['SMS_Sent_Date2']).'</center></td><td><center>'.$row3['SMS_Sent_Num2'].'</center></td></tr>';
		echo '<tr><td><center>'.$row3['SMS_Sent_Msg3'].'</center></td><td><center>'.date("d-m-Y à H:i:s",$row3['SMS_Sent_Date3']).'</center></td><td><center>'.$row3['SMS_Sent_Num3'].'</center></td></tr>';
		echo '<tr><td><center>'.$row3['SMS_Sent_Msg4'].'</center></td><td><center>'.date("d-m-Y à H:i:s",$row3['SMS_Sent_Date4']).'</center></td><td><center>'.$row3['SMS_Sent_Num4'].'</center></td></tr>';
		echo '<tr><td><center>'.$row3['SMS_Sent_Msg5'].'</center></td><td><center>'.date("d-m-Y à H:i:s",$row3['SMS_Sent_Date5']).'</center></td><td><center>'.$row3['SMS_Sent_Num5'].'</center></td></tr>';
		?>
		</table>
		<hr/>
		<h3>Gestion des contacts</h3>
		<form method="post" action="index.php?p=phone" name="ok">
		<fieldset>
				<legend>Contacts</legend>
				<br/>
				<div><label>Contact 1 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="co1" maxlength="32" type="text" value="<?php echo $row3['Contact1']; ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspNuméro :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="con1" type="text" maxlength="4" value="<?php echo $row3['Contact_Num1']; ?>" id="f1"/></div><br/>
				<div><label>Contact 2 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="co2" maxlength="32" type="text" value="<?php echo $row3['Contact2']; ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspNuméro :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="con2" type="text" maxlength="4" value="<?php echo $row3['Contact_Num2']; ?>" id="f1"/></div><br/>
				<div><label>Contact 3 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="co3" maxlength="32" type="text" value="<?php echo $row3['Contact3']; ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspNuméro :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="con3" type="text" maxlength="4" value="<?php echo $row3['Contact_Num3']; ?>" id="f1"/></div><br/>
				<div><label>Contact 4 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="co4" maxlength="32" type="text" value="<?php echo $row3['Contact4']; ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspNuméro :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="con4" type="text" maxlength="4" value="<?php echo $row3['Contact_Num4']; ?>" id="f1"/></div><br/>
				<div><label>Contact 5 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="co5" maxlength="32" type="text" value="<?php echo $row3['Contact5']; ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspNuméro :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="con5" type="text" maxlength="4" value="<?php echo $row3['Contact_Num5']; ?>" id="f1"/></div><br/>
				<div><label>Contact 6 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="co6" maxlength="32" type="text" value="<?php echo $row3['Contact6']; ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspNuméro :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="con6" type="text" maxlength="4" value="<?php echo $row3['Contact_Num6']; ?>" id="f1"/></div><br/>
				<div><label>Contact 7 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="co7" maxlength="32" type="text" value="<?php echo $row3['Contact7']; ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspNuméro :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="con7" type="text" maxlength="4" value="<?php echo $row3['Contact_Num7']; ?>" id="f1"/></div><br/>
				<div><label>Contact 8 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="co8" maxlength="32" type="text" value="<?php echo $row3['Contact8']; ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspNuméro :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="con8" type="text" maxlength="4" value="<?php echo $row3['Contact_Num8']; ?>" id="f1"/></div><br/>
				<div><label>Contact 9 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="co9" maxlength="32" type="text" value="<?php echo $row3['Contact9']; ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspNuméro :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="con9" type="text" maxlength="4" value="<?php echo $row3['Contact_Num9']; ?>" id="f1"/></div><br/>
				<div><label>Contact 10 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="co10" maxlength="32" type="text" value="<?php echo $row3['Contact10']; ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspNuméro :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="con10" type="text" maxlength="4" value="<?php echo $row3['Contact_Num10']; ?>" id="f1"/></div><br/>
				<div><label>Contact 11 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="co11" maxlength="32" type="text" value="<?php echo $row3['Contact11']; ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspNuméro :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="con11" type="text" maxlength="4" value="<?php echo $row3['Contact_Num11']; ?>" id="f1"/></div><br/>
				<div><label>Contact 12 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="co12" maxlength="32" type="text" value="<?php echo $row3['Contact12']; ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspNuméro :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="con12" type="text" maxlength="4" value="<?php echo $row3['Contact_Num12']; ?>" id="f1"/></div><br/>
				<br/>
			<center><button class="buton_g" name="ok" type="submit">Enregistrer</button></center>
		</center>
			</fieldset></form></p>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>