<?php

//CRUD
class ServicoService {
	private $conexao;
	private $servico;

	public function __construct(Conexao $conexao, Servico $servico){
		$this->conexao = $conexao->conectar();
		$this->servico = $servico;
	}

	public function inserir(){//create
		$query = 'insert into tb_ordemservico(os,status,nome_cliente,bairro,cidade,uf,
					linha,modelo,produto,valor_produto,cobertura,data_abertura)
					Values(:os,:status,:nome_cliente,:bairro,:cidade,:uf,
					:linha,:modelo,:produto,:valor_produto,:cobertura,:data_abertura)';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':os',$this->servico->__get('os'));
		$stmt->bindValue(':status',$this->servico->__get('status'));
		$stmt->bindValue(':nome_cliente',$this->servico->__get('nome_cliente'));
		$stmt->bindValue(':bairro',$this->servico->__get('bairro'));
		$stmt->bindValue(':cidade',$this->servico->__get('cidade'));
		$stmt->bindValue(':uf',$this->servico->__get('uf'));
		$stmt->bindValue(':linha',$this->servico->__get('linha'));
		$stmt->bindValue(':modelo',$this->servico->__get('modelo'));
		$stmt->bindValue(':produto',$this->servico->__get('produto'));
		$stmt->bindValue(':valor_produto',$this->servico->__get('valor_produto'));
		$stmt->bindValue(':cobertura',$this->servico->__get('cobertura'));
		$stmt->bindValue(':data_abertura',$this->servico->__get('data_abertura'));

		$stmt->execute();
	}

	public function recuperar(){//OS aberta por mes
		$query = "select extract(month from data_abertura) as mes,count(os) as quantidade from tb_ordemservico group by mes";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);

	}

	public function recuperarStatus() {//quantidade de OS por status
		$query = "select status, count(os) as quantidade FROM tb_ordemservico Group by status";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function ranking() {//ranking dos modelos de produto mais solicitados
		$query = "select produto, count(produto) as ranking from tb_ordemservico Group by produto Order by ranking desc limit 10";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);

	}

	public function recupararUf() {//recupera quantidade de OS por estado 
		$query = "select uf, count(os) as quantidade FROM tb_ordemservico Group by uf";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

}?>