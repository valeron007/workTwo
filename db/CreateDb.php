<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 12.12.18
 * Time: 16:49
 */

class CreateDb
{
	private static $db = Null;
	private static $name;

	private function __construct()
	{

	}

	public static function getInstance(){
		if(is_null(self::$db)){
			self::$db = new SQLite3(/** @lang text */
				'db/database.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
		}

		return self::$db;
	}

}