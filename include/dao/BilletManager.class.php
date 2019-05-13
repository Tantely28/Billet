<?php

	class BilletManager
	{
		private $db;
		public function __construct($db)
		{
			$this->setDb($db);
		}
		public function setDb(PDO $db)
		{
			$this->_db = $db;
		}
		public function add(Billet $billet)
		{
			// Préparation de la requête d'insertion.
			// Assignation des valeurs 
			// Exécution de la requête.
			if(($billet->Laharana()!=""))
			{
				$q = $this->_db->prepare('INSERT INTO billet SET Laharana = :Laharana');
				$q->bindValue(':Laharana', $billet->Laharana());
				$q->execute();
				var_dump($q);
			}
			else
			{
				$rep ="Misy problème kely fa aoka aloha ";
				echo $rep; 
			}

		}
		
		/*public function get($id)
		{
			$id = (int)$id;
			$Requete = " SELECT * FROM adidy WHERE idAdidy = :id ";
			$req = $this->_db->prepare($Requete);
			$req->bindValue(':id', $id, PDO::PARAM_INT);
			$req->execute();
			$tabAdidy = $req->fetch();
			return ( (!empty($tabAdidy)) ? new Adidy($tabAdidy) : 0 );
		}*/
		/*public function getNameById($id)
		{
			$id = (int)$id;
			$Requete = " SELECT mpiangona.Nom, mpiangona.Prenom FROM  mpiangona INNER JOIN mpandray ON mpiangona.idMpiangona = mpandray.idMpiangona WHERE mpandray.idMpiangona = :id ";
			$req = $this->_db->prepare($Requete);
			$req->bindValue(':id', $id, PDO::PARAM_INT);
			$req->execute();
			$tabMpiangona = $req->fetch();
			return ( (!empty($tabMpiangona)) ? new Mpiangona($tabMpiangona) : 0 );
			//return $tabMpiangona;
		}*/
		
		public function getList()
		{
			$bil = array();
				$q = $this->_db->query('SELECT * FROM billet ORDER BY Laharana');
				while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
				{
					$bil[] = new Billet($donnees);
				}
			return $bil;
		}
		
		//suppression
		/*public function deleteidAdidy(Adidy $adi)
		{
			// Exécute une requête de type DELETE.
			if(is_int($adi->idAdidy()))
			{
				$this->_db->exec('DELETE FROM adidy where idAdidy='.$adi->idAdidy());
			}
		}*/

		//compter
		public function count()
		{
			return $this->_db->query('SELECT COUNT(*) FROM billet')->fetchColumn();
		}

		//calculBillet 
		public function countBillet($nombreBillet)
		{
			$rep = array();
			$rep[0] = $nombreBillet;
			$vendue = $this->_db->query('SELECT COUNT(*) FROM billet')->fetchColumn();
			$rep[1] = $vendue;
			$rep[2] = 0;
			$rep[3] = "";

			if($rep[0] > $rep[1]){
				$rep[1] = $vendue;
				$rep[2] = $rep[0]- $rep[1];
				$rep[3] = "des billets restants";
			}
			if($rep[0] == $rep[1]){
				$rep[1] = $vendue;
				$rep[2] = $rep[0]- $rep[1];
				$rep[3] = "Guichet fermé à la prochaine";
			}
			return $rep;
		}
		//modifier
		/*public function updateidAdidy(Adidy $adi)
		{
			if(($adi->idAdidy()!="")&&($adi->idMpandray()!="")&&($adi->Daty_nandoavana()!="")&&($adi->Volana()!="")&&($adi->Vola_naloha()!=""))
			{
				$q = $this->_db->prepare('UPDATE adidy SET idAdidy =
					:idAdidy , idMpandray = :idMpandray, Daty_nandoavana = :Daty_nandoavana, Volana = :Volana,
					Vola_naloha = :Vola_naloha');
					$q->bindValue(':idAdidy', $mbr->idAdidy(),
					PDO::PARAM_INT);
					$q->bindValue(':idMpandray', $mbr->idMpandray());
					$q->bindValue(':Daty_nandoavana', $mbr->Daty_nandoavana());
					$q->bindValue(':Volana', $mbr->Volana());
					$q->bindValue(':Vola_naloha', $mbr->Vola_naloha());
					$q->execute();
			}
			else
			{
				$rep ="Misy olana kely ";
				echo $rep; 
			}
		}*/

		//
		/*public function totalAdidy($mois)
		{
			if(is_string($mois))
			{
				echo "restreint";
			}
		}*/
		
		//rechercher par nom 
		/*public function rechecherParNomId($id){
			
		}*/
		//remplacer par 3 points si textes 150 caractéres
		
	}
?>