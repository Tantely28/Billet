<?php
	class Billet
	{
		private $_Laharana;
		private $_Anarana;
		private $_Paye;
		
		public function __construct(array $donnees)
		{
			$this->hydrate($donnees);
		}
		
		public function hydrate(array $donnees)
		{
			foreach($donnees as $key => $value)
			{
				$method = 'set'.ucfirst($key);
				if(method_exists($this, $method))
				{
					$this->$method($value);
				}
			}
		}
		
		//setter
		public function setLaharana($laharana)
		{
			$laharana= (int)$laharana;
			if($laharana>0)
			{
				$this->_Laharana=$laharana;
			}
		}
		public function setAnarana($Anarana)
		{
			
				$this->_Anarana=$Anarana;
		}
		public function setPaye($Paye)
		{
			if(is_string($Paye))
			{
				$this->_Paye = $Paye;
			}
		}
		


		//getter
		public function Laharana()
		{
			return $this->_Laharana;
		}
		public function Anarana()
		{
			return $this->_Anarana;
		}
		public function Paye()
		{
			return $this->_Paye;
		}
	}
?>