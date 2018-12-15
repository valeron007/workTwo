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

$resultUpdate;

if(isset($_POST['var_one']) && !empty($_POST['var_one'])){
	$resultUpdate = $query = "UPDATE formuls SET var_one =" . $_POST['var_one'] . " WHERE id = " . $_POST['id'] . ";";
	$db->exec($query);
}

if(isset($_POST['var_two']) && !empty($_POST['var_two'])){
	$resultUpdate = $query = "UPDATE formuls SET var_two =" . $_POST['var_two'] . " WHERE id = " . $_POST['id'] . ";";
	$db->exec($query);
}


