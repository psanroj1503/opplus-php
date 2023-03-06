<?php

	require_once "lib/Database.php" ;

	class Problema {

		public String $idIsu ;
		public String $level ;
		public String $creationDate ;
		public String $description ;
		public String $reviewed ;

		public function actuales(): array {

			$db = Database::get() ;
			$db->query("SELECT * 
				        FROM problema 
						WHERE IdIsu = '{$this->idIsu}' ;") ;

			return $db->all() ;
		}

		public function solucionar() {

			$db = Database::get() ;
			$db->query("UPDATE problema 
						SET reviewed = 0
						WHERE idIsu = '{$this->idIsu}' ; ") ;

		}

		public function solucionar2() {
			
			$db = Database::get() ;
			$db->query("UPDATE problema 
						SET reviewed = 1
						WHERE idIsu = '{$this->idIsu}' ; ") ;

		}

		/**
		 * @return
		 */
		public static function find(String $idIsu): ?Problema {

			$db = Database::get() ;
			$db->query("SELECT * FROM problema WHERE idIsu = '{$idIsu}' ;") ;

			return $db->row("Problema") ;
		}

		/**
		 * @return
		 */
		public static function getAll(): array {

			$db = Database::get() ;
			$db->query("SELECT * FROM problema ;") ;

			return $db->all("Problema") ;
		}

		/**
		 * @return string
		 */
		public function __toString(): String {
			return "{$this->level} {$this->description}" ;
		}

	}