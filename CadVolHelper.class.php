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
				$sql = "SELECT * FROM funcionario WHERE username = '".pg_escape_string($_POST['username'])."';";
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

	}

?>