<?php

	session_start();
	include("../include/dao/ConnexionDB.class.php");
	include("../include/dao/BilletManager.class.php");
	include("../include/dao/Billet.class.php");
	function chargerClasse($classe) {
		require '../include/dao/'.$classe.'.class.php';
	}
	spl_autoload_register('chargerClasse');
	
		/*$db =new Connexion();
		$manager = new AdidyManager($db);
		if(isset($_POST["btnRechercher"]))
		{
			$str=$manager->getNameById($_POST["txtIdMpiangona"]);
			var_dump($str);
			//$_SESSION["volana"] = $_POST["txtIdMpiangona"];
			header("Location: ../controleur/contAdidyLister.php");
		}*/
		//header("Location: ../page/adidyVuesPrincipal.php");
		echo "<script type='text/javascript'>document.location.replace('../index.php');</script>";
		exit();
		$_SESSION["param"] = $param;
		
		
?>