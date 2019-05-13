<?php
	session_start();
	include("../include/dao/ConnexionDB.class.php");
	include("../include/dao/BilletManager.class.php");
	include("../include/dao/Billet.class.php");
	
	function chargerClasse($classe) {
		require '../include/dao/'.$classe.'.class.php';
	}

	spl_autoload_register('chargerClasse');
	$db =new Connexion();
		$manager = new BilletManager($db);
	if(!isset($_POST["btnAjouter"]) ) 
	{
		//header("Location: ../page/vaovaoVuesAjouter.php");
		echo "<script type='text/javascript'>document.location.replace('../page/billetVuesAjouter.php');</script>";
		exit();
	}
	else
	{
		$billet = new billet(array(
			'Laharana'=>$_POST['txtLaharana']));
		$manager->add($billet);
		var_dump($billet);
		//header("Location: ../controleur/contVaovaoLister.php");
		echo "<script type='text/javascript'>document.location.replace('../controleur/contBilletLister.php');</script>";
		exit();
	}
?>