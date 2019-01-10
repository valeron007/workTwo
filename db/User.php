<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 04.01.19
 * Time: 7:19
 */

require_once "CreateDb.php";

class User
{
	private $connect;

	public function __construct()
	{
		$this->connect = CreateDb::getInstance();
	}

	public function getUserByName($name)
	{
		$query = 'SELECT * FROM users WHERE name = :name';

		$stmt = $this->connect->prepare($query);
		$stmt->bindValue(':name', $name, SQLITE3_TEXT);
		$result = $stmt->execute();

		return $result->fetchArray(SQLITE3_ASSOC);
	}

	public function getUserById($id)
	{
		$query = 'SELECT * FROM users WHERE name = :id';

		$stmt = $this->connect->prepare($query);
		$stmt->bindValue(':id', $id, SQLITE3_TEXT);
		$result = $stmt->execute();

		return $result->fetchArray(SQLITE3_ASSOC);
	}


}



