<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 07.01.19
 * Time: 18:20
 */

require_once 'CreateDb.php';

class FormulsData
{
	private $connect;

	public function __construct()
	{
		$this->connect = CreateDb::getInstance();
	}

	public function getAllRows(){
		$query = 'SELECT * FROM formulsData';

		$stmt = $this->connect->query($query);

		$result = [];
		while ($res = $stmt->fetchArray(SQLITE3_ASSOC)){
			$result[] = $res;
		}

		return $result;
	}

	public function getFormulsDataUser($name){
		$query = 'SELECT * FROM formulsData WHERE name = :name';

		$stmt = $this->connect->prepare($query);
		$stmt->bindValue(':name', $name, SQLITE3_TEXT);
		$result = $stmt->execute();

		$data = [];

		while ($res = $result->fetchArray(SQLITE3_ASSOC)){
			$data[] = $res;
		}

		return $data;
	}


}