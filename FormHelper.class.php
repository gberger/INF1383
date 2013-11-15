<?php

class FormHelper {

	public static function handleVolunteerForm( )
	{
		if(isset($_POST['VolunteerForm']))
		{
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

		return true;
	}

}

?>