<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 13.12.18
 * Time: 15:58
 */

$db = new SQLite3('../db/database.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

$query = 'CREATE TABLE IF NOT EXISTS users (
                        user_id  INTEGER PRIMARY KEY NOT NULL,
                        name VARCHAR(50),
                        email VARCHAR(50)                        
                      )';

$db->exec($query);

$insertUser = "INSERT INTO users(name, email) VALUES ('Valeron', 'valeron@gmail.com')";

$db->exec($insertUser);


