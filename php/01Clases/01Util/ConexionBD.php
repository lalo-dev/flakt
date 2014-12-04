<?php

	class ConexionBD
	{
		var $host = "localhost";
		var $userDb = "root";
		var $passwordDb = "";
		var $dataBaseName = "flaktdb";
		var $conection;

		function ConectToDataBase(){
			$this->conection = mysql_connect($this->host, $this->userDb, $this->passwordDb) or die (mysql_error());
			mysql_select_db($this->dataBaseName, $this->conection);
		}

		function CloseDataBase(){
			mysql_close($this->conection);
		}

		function SetNames(){
			$querySetNames = "SET NAMES 'utf8'";
			$setNames = mysql_query($querySetNames, $this->conection);
		}

		function ExecuteWithoutReturn($strQuery){
			$this->ConectToDataBase();
			$setNames = $this->SetNames();
			$query = mysql_query($strQuery, $this->conection);
			settype($query, "null");
			$error = mysql_errno($this->conection) . ": " . mysql_error($this->conection) . "";
			$this->CloseDataBase();
			return $error;
		}

		function ExecuteWithReturn($strQuery){
			$this->ConectToDataBase();
			$setNames = $this->SetNames();
			$query = mysql_query($strQuery, $this->conection);
			$records = array();
			while($record = mysql_fetch_array($query)){
				$records[] = $record;
			}

			$this->CloseDataBase();
			return $records;
		}

		function ExecuteWithFilter($tableName, $filter){
			$records = $this->ExecuteWithReturn("SELECT * FROM $tableName WHERE $filter");
			return $records;
		}

		function ExecuteReturnColumn($tableName, $field, $filter){
			if($filter != ""){
				$strQuery = "SELECT $field FROM $tableName WHERE $filter";
			}
			else{
				$strQuery = "SELECT $field FROM $tableName";
			}

			$records = $this->ExecuteWithReturn($strQuery);
			$resultRecords = array();

			foreach($records as $record){
				$resultRecords[] = $record;
			}

			return $resultRecords;
		}

		function NumRows($strQuery){
			$this->ConectToDataBase();
			$rows = mysql_query($strQuery, $this->conection);
			$numRows = mysql_num_rows($rows);
			$this->CloseDataBase();
			return $numRows;
		}

		function InsertedIdRecord(){
			$this->ConectToDataBase();
			$insertedId = mysql_insert_id($this->conection);
			$this->CloseDataBase();
			return $insertedId;
		}
	}

?>