<?php

	require "servico.model.php";
	require "servico.service.php";
	require "conexao.php";

	//$acao = 'inserir';

	//if($acao == 'inserir'){
		//teste para ver se o arquivo está vindo
		//$dados = $_FILES['arquivo'];
		//var_dump($dados);

		if(!empty($_FILES['arquivo']['tmp_name'])){
			$arquivo = new DomDocument();
			$arquivo->load($_FILES['arquivo']['tmp_name']);
			
			$linhas = $arquivo->getElementsByTagName("Row");
			//print_r($linhas);

			$primeira_linha = true;//para tirar o cabeçalho

			//percorrer as linhas
			foreach ($linhas as $linha) {

				if($primeira_linha == false){
					$os = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
					$status = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
					$nome = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
					$bairro = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
					$cidade = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
					$uf = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
					$linha_xml = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
					$modelo = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
					$produto = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
					$valor_produto = $linha->getElementsByTagName("Data")->item(9)->nodeValue;

					if(is_object($linha->getElementsByTagName("Data")->item(10))) {
						$cobertura = $linha->getElementsByTagName("Data")->item(10)->nodeValue; 
					}

					if(is_object($linha->getElementsByTagName("Data")->item(11))) {
						$data_abertura = $linha->getElementsByTagName("Data")->item(11)->nodeValue; 
					}
				
					//echo $os . $status . $nome . $bairro. $cidade . $uf . $linha_xml . $modelo . $produto . $valor_produto. $cobertura.$data_abertura."<br>";*/

					$servico = new Servico();
					$servico->__set('os',$os);
					$servico->__set('status',$status);
					$servico->__set('nome_cliente',$nome);
					$servico->__set('bairro',$bairro);
					$servico->__set('cidade',$cidade);
					$servico->__set('uf',$uf);
					$servico->__set('linha',$linha_xml);
					$servico->__set('modelo',$modelo);
					$servico->__set('produto',$produto);
					$servico->__set('valor_produto',$valor_produto);
					$servico->__set('cobertura',$cobertura);
					$servico->__set('data_abertura',$data_abertura);

					//print_r($servico);

					$conexao = new Conexao();

					$servicoService = new ServicoService($conexao, $servico);

					$servicoService->inserir();

					header("Location: consultas.php");

					
				}
				$primeira_linha = false;
			}
		}
	//}//fecha inserir
	/*else if($acao == 'recuperar'){
		$conexao = new Conexao();
		$servico = new Servico();

		$servicoService = new ServicoService($conexao,$servico);

		$tarefas = $servicoService->recuperar();
	}*/

?>