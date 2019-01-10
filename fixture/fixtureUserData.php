
<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 13.12.18
 * Time: 15:58
 */

$db = new SQLite3('../db/database.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

$query = 'CREATE TABLE IF NOT EXISTS formulsData (
                        id  INTEGER PRIMARY KEY NOT NULL,
                        number INTEGER,
                        formula TEXT NOT NULL,
                        var_one INTEGER NOT NULL,
                        var_two INTEGER NOT NULL,
                        name VARCHAR(50) NOT NULL,
                        FOREIGN KEY(number) REFERENCES formuls(number)                                                                 
                      )';

$index = "CREATE UNIQUE INDEX user_number ON formulsData(number, name)";

$db->exec($query);

$db->exec($index);
