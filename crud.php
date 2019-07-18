<?php
class Crud extends Database {

	//select all data from the database

	public function select()
	{
		$sql = "SELECT * FROM crud";

		$result = $this->connect()->query($sql);

		if ($result->rowCount() > 0) {

			# code...
			while ($row = $result->fetch()){

				$data[] = $row;
			}

			return $data;
			
		}
	}

	public function insert($fields){

		//$sql = "INSERT INTO crud (first_name,last_name,number) VALUES (:first_name,:last_name,:number)";

		$implodeColumns = implode(', ',array_keys($fields));

		$implodePlaceholder = implode(", :",array_keys($fields));

		$sql = "INSERT INTO crud ($implodeColumns) VALUES (:".$implodePlaceholder.")";

		$stmt = $this->connect()->prepare($sql);

		foreach ($fields as $key => $value) {

			$stmt->bindValue(':'.$key,$value);
			# code...
		}


		$stmtExec = $stmt->execute();

		if ($stmtExec) {

			header('Location: index.php');
			# code...
		}

	}

	public function selectOne($id){

		$sql = "SELECT * FROM crud WHERE id = :id";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(":id",$id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	public function update($fields,$id){

		$st = "";
		$counter = 1;
		$total_fields = count($fields);
		foreach ($fields as $key => $value) {

			if ($counter === $total_fields) {

				$set = "$key = :".$key;
				$st = $st.$set;
				# code...
			} else {
				$set = "$key = :".$key.", ";
				$st = $st.$set;
				$counter++;

			}
			# code...
		}

		$sql = "";
		$sql.= "UPDATE crud SET ".$st;
		$sql.= " WHERE id = ".$id;

		$stmt = $this->connect()->prepare($sql);

		foreach ($fields as $key => $value) {

			# code...
			$stmt->bindValue(':'.$key, $value);


		}

		$stmtExec = $stmt->execute();

		if ($stmtExec) {

			header('Location: index.php');
			# code...
		}
	}
	
	public function destroy($id){
		$sql = "DELETE FROM crud WHERE id = :id";

		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
	}	
}