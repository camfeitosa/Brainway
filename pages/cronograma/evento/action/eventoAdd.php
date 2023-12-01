<?php
	if(!isset($_SESSION)){
		session_start();
	}

	require_once('conexao.php');
	$database = new Database();
	$db = $database->conectar();

	if (isset($_POST['titulo']) && isset($_POST['descricao']) && isset($_POST['inicio']) && isset($_POST['termino']) && isset($_POST['cor'])){
		
		$titulo = $_POST['titulo'];
		$descricao = $_POST['descricao'];
		$inicio = $_POST['inicio'];
		$termino = $_POST['termino'];
		$cor = $_POST['cor'];
		$id_user = $_SESSION['id_user'];

		$inicio= date('Y/m/d H:i:s', strtotime($inicio));
		$termino= date('Y/m/d H:i:s', strtotime($termino));

		
		$sql = "INSERT INTO cronograma(fk_id_user, titulo, descricao, inicio, termino, cor) values ('$id_user', '$titulo', '$descricao', '$inicio', '$termino', '$cor')";
		
		echo $sql;
		
		$query = $db->prepare( $sql );
		if ($query == false) {
			print_r($db->errorInfo());
			die ('Erro ao carregar');
		}
		
		$sth = $query->execute();
		if ($sth == false) {
			print_r($query->errorInfo());
			die ('Erro ao executar');
		}

		//Seleciona ultimo evento e incrementa a tabela 'convites' se necessario
		$ultimoEvento = "SELECT * FROM cronograma ORDER BY id_evento DESC LIMIT 1";	
		$req = $db->prepare($ultimoEvento);
		$req->execute();
		$linhas = $req->rowCount();
		if ($linhas == 1) {
			while ($dados = $req->fetch(PDO::FETCH_ASSOC)) {
				$id_evento = $dados['id_evento'];
			}
		}


	}
	header('Location: '.$_SERVER['HTTP_REFERER']);	
?>