<?php

class FormHelper {

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
					$update .= pg_escape_string($attr)."=".($value != NULL ? ("'".pg_escape_string($value)."'") : "NULL");
					if(++$i != $total) $update .= ', ';
				}
				$update .= " WHERE cpf = '".pg_escape_string($_GET['cpf'])."';";

				$command = $dbconn->executeCommand($update);
				if($command == 0)
					return $_POST['VolunteerForm'];
				else
					CadVolHelper::redirect('/voluntario/visualizar.php');

			} else {
				return $voluntario;
			}

		} else {

			if(isset($_POST['VolunteerForm'])) {
				$insert = "INSERT INTO voluntario VALUES (";
				foreach ($_POST['VolunteerForm'] as $attr => $value) {
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