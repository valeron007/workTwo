<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 13.12.18
 * Time: 19:52
 */

require_once "db/CreateDb.php";


$db = CreateDb::getInstance();

$data = $_POST;

$searchQuery = 'SELECT * FROM formulsData WHERE number = :number AND name = :name';

$searchStmt = $db->prepare($searchQuery);
$searchStmt->bindValue('number', (int)$data['number'], SQLITE3_INTEGER);
$searchStmt->bindValue('name', $data['login'],SQLITE3_TEXT);
$result = $searchStmt->execute()->fetchArray();

$resultOrUpdate = false;

if(!$result){
	$resFormulData = "INSERT INTO formulsData(number, formula, var_one, var_two, name) 
		VALUES (:number, :formula, :var_one, :var_two, :name)";
	$insertData = $db->prepare($resFormulData);
	$insertData->bindValue('number', (int)$data['number'], SQLITE3_INTEGER);
	$insertData->bindValue('formula', $data['formula'], SQLITE3_TEXT);
	$insertData->bindValue('var_one', (int)$data['var_one'], SQLITE3_INTEGER);
	$insertData->bindValue('var_two', (int)$data['var_two'], SQLITE3_INTEGER);
	$insertData->bindValue('name', $data['login'], SQLITE3_TEXT);
	$resultOrUpdate = $insertData->execute();
}else{
	$updateFormulaData = "UPDATE formulsData 
						SET var_one = :var_one, var_two = :var_two 
						WHERE name = :name AND number = :number";
	$updateData = $db->prepare($updateFormulaData);
	$updateData->bindValue('var_one', (int)$data['var_one'], SQLITE3_INTEGER);
	$updateData->bindValue('var_two', (int)$data['var_two'], SQLITE3_INTEGER);
	$updateData->bindValue('name', $data['login'], SQLITE3_TEXT);
	$updateData->bindValue('number', (int)$data['number'], SQLITE3_INTEGER);
	$resultOrUpdate = $updateData->execute();
}


