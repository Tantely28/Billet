<?php
	include("include/dao/ConnexionDB.class.php");
	include("include/dao/BilletManager.class.php");
	include("include/dao/Billet.class.php"); 
	
	//session_start();
	function __autoload($classe) {
		require '../include/dao/'.$classe.'.class.php';
	}
	/*$param = $_SESSION['param'];
	unset($_SESSION['param']);*/
	session_start();
	$db=new Connexion();
		$manager = new BilletManager($db);
		$param = $manager->getList();
		$compteur = $manager->countBillet(250);

		//$db->fermerBDD();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	
	<body>
		<div class="page-wrap">
			<!-- header -->
			<header class="header">
				<div class="container">
					<div class="header__toogleGroup">
						<div class="header__chooseLanguage">
							<!-- dropdown -->
							<p style="font-family:verdana; color : red;"></p>			
						</div>	
					</div>
			</header><!-- End / header -->

		<!-- Content-->
		<div class="md-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 col-xl-8 offset-0 offset-sm-0 offset-md-0 offset-lg-1 offset-xl-2 ">
						<!--<div style="margin-bottom:10px; font-family:forte;"></div>-->
						<div class="title-01 title-01__style-04">
							<h6 class="title-01__subTitle">BILLET</h6>
						</div><!-- End / title-01 -->
                    </div>
				</div>
			</div>
			<script type="text/javascript" src="../libraryJs/jquery.min.js"></script>
			<div class="row">
				<div class="col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
				<form method="post" action="../controleur/contMpiangonaLister.php">
				<div class="form-01__form">
					<div class="form__item form__item--03">
						<input type="text" name="name" class="search form-control" placeholder="Recherche"/>
					</div>
					<div class="form__item form__item--03">
						<label>Nombre de billet à vendre:</label> <?php echo $compteur[0];?></br>
						<label>Nombre total de billet vendue:</label> <?php echo $compteur[1];?></br>
						<label>Nombre de billet restant:</label> <?php echo $compteur[2];?></br>
						<label>Message:</label> <?php echo $compteur[3];?>
					</div>
				</div>
				<table  class="table table-hover table-bordered table-responsive" id="userTbl">
					<!--<table class="table table-hover table-dark">-->
					<thead class="thead-dark">
						<tr>
							<!--<th>idMpiangona</th>-->
							<th>N</th>
							<th>Laharana</th>
							<!--<th>paye</th>-->
						</tr>
					</thead>
					<tbody>
						<?php if( !empty($param) ) { $i=1;?>
						<?php foreach($param as $element) { ?>
						<tr class="table-warning" style="text-align: center;">
							<td><?php echo htmlspecialchars($i++); ?></td>
							<td><?php echo htmlspecialchars(stripslashes($element->Laharana()));?></td>
							<!--<td><?php echo htmlspecialchars(stripslashes($element->Anarana())); ?></td>
							<td><?php echo htmlspecialchars(stripslashes($element->paye())); ?></td>-->
						</tr>
						<?php } ?>
						<?php } ?>
					</tbody>
					<tfoot>
				</table>
			</form>
			</div>
			</div>
				

			<script>
				$(document).ready(function(){
					$('.search').on('keyup',function(){
						var searchTerm = $(this).val().toLowerCase();
						$('#userTbl tbody tr').each(function(){
							var lineStr = $(this).text().toLowerCase();
							if(lineStr.indexOf(searchTerm) === -1){
								$(this).hide();
							}else{
								$(this).show();
							}
						});
					});
				});
							
			</script>
		</div>
	</div>
		
		<!-- Vendors-->
		<script type="text/javascript" src="assets/vendors/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="assets/vendors/imagesloaded/imagesloaded.pkgd.js"></script>
		<script type="text/javascript" src="assets/vendors/isotope-layout/isotope.pkgd.js"></script>
		<script type="text/javascript" src="assets/vendors/jquery.countdown/jquery.countdown.min.js"></script>
		<script type="text/javascript" src="assets/vendors/jquery.countTo/jquery.countTo.min.js"></script>
		<script type="text/javascript" src="assets/vendors/jquery.countUp/jquery.countup.min.js"></script>
		<script type="text/javascript" src="assets/vendors/jquery.matchHeight/jquery.matchHeight.min.js"></script>
		<script type="text/javascript" src="assets/vendors/jquery.mb.ytplayer/jquery.mb.YTPlayer.min.js"></script>
		<script type="text/javascript" src="assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="assets/vendors/masonry-layout/masonry.pkgd.js"></script>
		<script type="text/javascript" src="assets/vendors/owl.carousel/owl.carousel.js"></script>
		<script type="text/javascript" src="assets/vendors/jquery.waypoints/jquery.waypoints.min.js"></script>
		<script type="text/javascript" src="assets/vendors/menu/menu.min.js"></script>
		<script type="text/javascript" src="assets/vendors/smoothscroll/SmoothScroll.min.js"></script>
		<!-- App-->
		<script type="text/javascript" src="assets/js/main.js"></script>
	</body>
</html>
