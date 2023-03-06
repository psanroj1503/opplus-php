<?php

	class Database {

		private static ?Database $instancia = null ;
		private $resultado ;
		private $db ;

		private function __clone() {}
		private function __construct() {
			try {
				$this->db = new mysqli("localhost", "root", "", "issues") ;
			} catch(mysqli_sql_exeption $e) {
				die("** Error de conexión con la base de datos") ;		
			}
		}

		/**
		 * @return
		 */
		public static function get() {

			if (self::$instancia==null) self::$instancia = new Database ;
			return self::$instancia ;
		}


		/**
		 * @param  String $sql 
		 * @return
		 */
		public function query(String $sql) {
			$this->resultado = $this->db->query($sql) ;
		}

		/**
		 * @param  String $class 
		 * @return 
		 */
		public function row(String $class = "StdClass")
		{
			return $this->resultado->fetch_object($class) ;
		}

		/**
		 * @param  String $class 
		 * @return 
		 */
		public function all(String $class = "StdClass"): array
		{
			$data = [] ;
			while($item = $this->row($class)) $data[] = $item ;

			return $data ;
		}


	}
