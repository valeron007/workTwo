<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 06.01.19
 * Time: 17:06
 */

require "db/Formuls.php";
require "db/FormulsData.php";

$formuls = new Formuls();
$results = $formuls->getAllRows();


if($_POST['type'] == 'custom'){
	$formulsData = new FormulsData();
	$datas = $formulsData->getFormulsDataUser($_POST['user']);

	foreach ($results as $key => $result){

		foreach ($datas as $data){
			if($data['number'] == $result['number']){
				$results[$key]['var_one'] = $data['var_one'];
				$results[$key]['var_two'] = $data['var_two'];
			}
		}
	}
}


echo json_encode($results);



