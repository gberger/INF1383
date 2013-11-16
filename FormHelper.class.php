<?php

class FormHelper {

	public static function handleActivityForm( )
	{
		if(isset($_GET['codigo'])) {
			$select ="SELECT * FROM atividade WHERE codigo = '".pg_escape_string($_GET['codigo'])."';";
			$dbconn = new SqlManager();
			$query = $dbconn->executeRead($select);
			if($query === false) return false;
			$voluntario = $query->fetch();

			if(isset($_POST['ActivityForm'])) {
				$newValues = $_POST['ActivityForm'];
				$update .= "UPDATE atividade SET ";

				$total = count($newValues);
				$i = 0;
				foreach ($newValues as $attr => $value) {
					if($attr == 'data')
						$value = DateTime::createFromFormat('d/m/Y',$value)->format('Y-m-d');
					$update .= pg_escape_string($attr)."=".($value != NULL ? ("'".pg_escape_string($value)."'") : "NULL");
					if(++$i != $total) $update .= ', ';
				}
				$update .= " WHERE codigo = '".pg_escape_string($_GET['codigo'])."';";

				$command = $dbconn->executeCommand($update);
				if($command == 0)
					return $_POST['ActivityForm'];
				else
					CadVolHelper::redirect('/atividade/visualizar.php?codigo='.$newValues['codigo']);

			} else {
				$voluntario['data'] = DateTime::createFromFormat('Y-m-d',$voluntario['data'])->format('d/m/Y');
				return $voluntario;
			}

		} else {

			if(isset($_POST['ActivityForm'])) {
				$insert = "INSERT INTO atividade VALUES ( DEFAULT, ";
				foreach ($_POST['ActivityForm'] as $attr => $value) {
					if($attr == 'data')
						$value = DateTime::createFromFormat('d/m/Y',$value)->format('Y-m-d');

					if($value != NULL && $value != '')
						$insert .= "'".pg_escape_string($value)."'";
					else
						$insert .= "NULL";

					if($attr != 'descricao')
						$insert .= ", ";
				}
				$insert .= ");";

				//var_dump($insert);

				$dbconn = new SqlManager();
				$command = $dbconn->executeCommand($insert);
				//var_dump($dbconn->conn->errorInfo());
				if($command == 1)
					return true;
				else
					return $_POST['ActivityForm'];
			}
		}

		return true;
	}

	public static function handleVolunteerForm( )
	{
		if(isset($_GET['cpf'])) {
			$select ="SELECT * FROM voluntario WHERE cpf = '".pg_escape_string($_GET['cpf'])."';";
			$dbconn = new SqlManager();
			$query = $dbconn->executeRead($select);
			if($query === false) return false;
			$voluntario = $query->fetch();

			if(isset($_POST['VolunteerForm'])) {
				$newValues = $_POST['VolunteerForm'];
				$update .= "UPDATE voluntario SET ";

				$total = count($newValues);
				$i = 0;
				foreach ($newValues as $attr => $value) {
					if($attr == 'data_nasc')
						$value = DateTime::createFromFormat('d/m/Y',$value)->format('Y-m-d');
					$update .= pg_escape_string($attr)."=".($value != NULL ? ("'".pg_escape_string($value)."'") : "NULL");
					if(++$i != $total) $update .= ', ';
				}
				$update .= " WHERE cpf = '".pg_escape_string($_GET['cpf'])."';";

				$command = $dbconn->executeCommand($update);
				if($command == 0)
					return $_POST['VolunteerForm'];
				else
					CadVolHelper::redirect('/voluntario/visualizar.php?cpf='.$newValues['cpf']);

			} else {
				$voluntario['data_nasc'] = DateTime::createFromFormat('Y-m-d',$voluntario['data_nasc'])->format('d/m/Y');
				return $voluntario;
			}

		} else {

			if(isset($_POST['VolunteerForm'])) {
				$insert = "INSERT INTO voluntario VALUES (";
				foreach ($_POST['VolunteerForm'] as $attr => $value) {
					if($attr == 'data_nasc')
						$value = DateTime::createFromFormat('d/m/Y',$value)->format('Y-m-d');

					if($value != NULL && $value != '')
						$insert .= "'".pg_escape_string($value)."'";
					else
						$insert .= "NULL";

					if($attr != 'obs')
						$insert .= ", ";
				}
				$insert .= ");";

				//var_dump($insert);

				$dbconn = new SqlManager();
				$command = $dbconn->executeCommand($insert);
				//var_dump($dbconn->conn->errorInfo());
				if($command == 1)
					return true;
				else
					return $_POST['VolunteerForm'];
			}
		}

		return true;
	}

}

?>