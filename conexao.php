<?php

class Conexao {

	private $host = 'localhost:3306';
	private $dbname = 'ordens_servicos';
	private $user = 'root';
	private $pass = '';

	public function conectar(){

		try{

			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass"			
			);

			return $conexao;


		}catch(PDOException $e){
			echo '<p>'. $e->getMessage() ."</p>";
		}

	}

}
	
?>