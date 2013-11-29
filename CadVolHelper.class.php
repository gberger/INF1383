<?php

	require_once "SqlManager.class.php";
	require_once "FormHelper.class.php";
	session_start();

	class CadVolHelper
	{
		public static function redirect( $uri )
		{
			header("Location: http://".$_SERVER['HTTP_HOST'].$uri);
			die();
		}


		public static function handleLogin( )
		{
			
			if(!empty($_SESSION['active'])) {
				if(isset($_GET['action']) && $_GET['action'] == 'logout' )
					session_destroy();
				self::redirect("/index.php");
			}

			if(isset($_POST['username']))
			{
				$dbconn = new SqlManager();
				$sql = "SELECT * FROM funcionario NATURAL JOIN voluntario WHERE username = '".pg_escape_string($_POST['username'])."';";
				$query = $dbconn->executeRead($sql);

				$user = $query->fetch();
				if($user == false) return true;
				//var_dump($user);
				if(trim($user['password']) == $_POST['password']) {
					$_SESSION['funcionario'] = $user;
					$_SESSION['active'] = true;
					self::redirect("/index.php");
				}

				return true;
			}

			return false;
		}

		public static function validateSession( )
		{
			if(empty($_SESSION['active'])) {
				self::redirect("/login.php");
			}
		}

		public static function obterEmissoresRG( )
		{
			$dbconn = new SqlManager();
			$sql = "SELECT * FROM emissor_rg";
			$query = $dbconn->executeRead($sql);

			$emissores = array();
			foreach($query as $row) {
				$emissores[$row['sigla']] = $row['nome'];
			}

			return $emissores;
		}

		public static function obterFiliais( )
		{
			$dbconn = new SqlManager();
			$sql = "SELECT * FROM filial";
			$query = $dbconn->executeRead($sql);

			$filiais = array();
			foreach($query as $row) {
				$filiais[$row['codigo']] = $row['estado'];
			}

			return $filiais;
		}

		public static function obterFuncionariosParaDropdown( )
		{
			$dbconn = new SqlManager();
			$sql = "SELECT * FROM funcionario NATURAL INNER JOIN voluntario ORDER BY nome";
			$query = $dbconn->executeRead($sql);

			$filiais = self::obterFiliais();

			$funcionarios = array();
			foreach($query as $row) {
				$funcionarios[$row['cpf']] = $row['nome'].' - '.$filiais[$row['cod_filial']];
			}

			return $funcionarios;
		}

		public static function obterVoluntarios( )
		{
			$dbconn = new SqlManager();
			$sql = "SELECT * FROM voluntario";
			if(isset($_GET['cpf']) && $_GET['cpf'] !== '')
				$sql .= " WHERE cpf = '".pg_escape_string($_GET['cpf'])."'";
			$query = $dbconn->executeRead($sql);

			return $query->fetchAll();
		}

		public static function obterAtividades( )
		{
			$dbconn = new SqlManager();
			$sql = "SELECT atividade.codigo, atividade.data, atividade.nome, atividade.endereco, COUNT(participacao.cpf) as totalvol ";
			$sql .= "FROM atividade LEFT OUTER JOIN participacao ON atividade.codigo = participacao.cod_ativ";
			
			$where = array();

			if(isset($_GET['data']) && $_GET['data'] !== '') {
				$datetime = DateTime::createFromFormat('d/m/Y', $_GET['data']);
				if($datetime != NULL) {
					$data = $datetime->format('Y-m-d');
					array_push($where, " atividade.data = '".pg_escape_string($data)."' ");
				}
			}

			if(isset($_GET['data_inicio']) && $_GET['data_inicio'] !== '') {
				$datetime = DateTime::createFromFormat('Y-m-d', $_GET['data_inicio']);
				if($datetime != NULL) {
					$data = $datetime->format('Y-m-d');
					array_push($where, " atividade.data >= '".pg_escape_string($data)."' ");
				}
			}

			if(isset($_GET['data_fim']) && $_GET['data_fim'] !== '') {
				$datetime = DateTime::createFromFormat('Y-m-d',$_GET['data_fim']);
				if($datetime != NULL) {
					$data = $datetime->format('Y-m-d');
					array_push($where, " atividade.data <= '".pg_escape_string($data)."' ");
				}
			}

			if(isset($_GET['nome']) && $_GET['nome'] !== '') {
				array_push($where, " atividade.nome ilike '%".pg_escape_string($_GET['nome'])."%' ");
			}

			if(isset($_GET['endereco']) && $_GET['endereco'] !== '') {
				array_push($where, " atividade.endereco ilike '%".pg_escape_string($_GET['endereco'])."%' ");
			}

			if(count($where) > 0){
				$sql .= " WHERE " . join($where, "AND");
			}

			$sql .= " GROUP BY atividade.codigo";
			$query = $dbconn->executeRead($sql);	

			return $query->fetchAll();
		}

		public static function obterParticipantes( )
		{
			$dbconn = new SqlManager();
			$sql = "SELECT * FROM participacao LEFT JOIN voluntario ON participacao.cpf_vol = voluntario.cpf ";
			$sql .= "WHERE participacao.cod_ativ = '".pg_escape_string($_GET['codigo'])."';";
			$query = $dbconn->executeRead($sql);
			
			return $query->fetchAll();
		}

	}

?>