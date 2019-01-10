<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 07.01.19
 * Time: 5:15
 */

require_once "CreateDb.php";

class Formuls
{
	private $connect;

	public function __construct()
	{
		$this->connect = CreateDb::getInstance();
	}

	public function getAllRows(){
		$query = 'SELECT * FROM formuls';

		$stmt = $this->connect->query($query);

		$result = [];
		while ($res = $stmt->fetchArray(SQLITE3_ASSOC)){
			$result[] = $res;
		}

		return $result;
	}

}