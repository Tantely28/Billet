<?php
	/*class Connexion extends PDO
	{
		private $server="db728406079.db.1and1.com";
		private $user="dbo728406079";
		private $mdp="Pass@fpvm10";
		private $database="db728406079";
		public function __construct()
		{
			
			try {

			   PDO::__construct("mysql:host=".$this->server.";dbname=".$this->database,$this->user,$this->mdp);
			} 
			catch (PDOException $e) {

			    echo 'Connexion échouée : ' . $e->getMessage();
			}
		}
		
		public function fermerBDD() 
		{
			unset($this);
		}
	}
  */
	class Connexion extends PDO
	{
		private $server="localhost";
		private $user="root";
		private $mdp="";
		private $database="enregistrementBillet";


		public function __construct()
		{
			try{

				PDO::__construct("mysql:serveur=".$this->server.";dbname=".$this->database,$this->user,$this->mdp);
			}
			catch (PDOException $e) {
				
								echo 'Connexion échouée : ' . $e->getMessage();
			}
		}
		
		/*public function fermerBDD() 
		{
			unset($this);
		}*/
	}
?>	