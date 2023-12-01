<?php

	require_once('conexao.php');
	$database = new Database();
	$db = $database->conectar();

	if (isset($_POST['delete']) && isset($_POST['id_evento'])){
		
		
		$id_evento = $_POST['id_evento'];
		
		$sql = "DELETE FROM cronograma WHERE id_evento = $id_evento";

		
		$query = $db->prepare( $sql );
		if ($query == false) {
			print_r($db->errorInfo());
			die ('Erro ao carregar');
		}

		$res = $query->execute();
		if ($res == false) {
			print_r($query->errorInfo());
			die ('Erro ao executar');
		}
		
	}else if (isset($_POST['titulo']) && isset($_POST['descricao']) && isset($_POST['inicio']) && isset($_POST['termino']) && isset($_POST['cor']) && isset($_POST['id_evento'])){
		
		$id_evento = $_POST['id_evento'];
		$titulo = $_POST['titulo'];
		$descricao = $_POST['descricao'];
		$inicio = $_POST['inicio'];
		$termino = $_POST['termino'];
		$cor = $_POST['cor'];

		$inicio= date('Y/m/d H:i:s', strtotime($inicio));
		$termino= date('Y/m/d H:i:s', strtotime($termino));
		
		$sql = "UPDATE cronograma SET  titulo = '$titulo', descricao = '$descricao', inicio = '$inicio', termino = '$termino', cor = '$cor' WHERE id_evento = $id_evento ";
		
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

	}
	header('Location: ../../index.php');
?>