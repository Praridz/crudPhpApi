<?php
    class Conectar{
        protected $dbh;
        //conexion a la base de datos
        protected function Conexion(){
            try {
				$conectar = $this->dbh = new PDO("mysql:dbname=bvrytqjlamkfc6nh8cek;host=bvrytqjlamkfc6nh8cek-mysql.services.clever-cloud.com:3306","u7nl0vt8je6ev0m7","YQIRVjCs5DecTSbZo4xg");
				return $conectar;
			} catch (Exception $e) {
				print "NELSON ¡Error BD!: " . $e->getMessage() . "<br/>";
				die();	
			}
        }
        //para caracteres especiales
        public function set_names(){	
			return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>