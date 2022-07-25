<?php

	class Servico {
		private $id;
		private $os;
		private $status;
		private $nome_cliente;
		private $bairro;
		private $cidade;
		private $uf;
		private $linha;
		private $modelo;
		private $produto;
		private $valor_produto;
		private $cobertura;
		private $data_abertura;


		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo,$valor){
			$this->$atributo = $valor;
			return $this;
		}
	}

?>