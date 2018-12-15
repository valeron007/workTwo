<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 13.12.18
 * Time: 15:58
 */

require_once "../db/CreateDb.php";

$data = CreateDb::getInstance();


$query = 'CREATE TABLE IF NOT EXISTS formuls (
                        id  INTEGER PRIMARY KEY NOT NULL,
                        number INTEGER,
                        formula TEXT NOT NULL,
                        var_one INTEGER NOT NULL,
                        var_two INTEGER NOT NULL
                      )';

$data->exec($query);

$insert_data = 'INSERT INTO `formuls` (`number`, `formula`, `var_one`, `var_two`) VALUES
  (1, \'a+b\', 150, 90),
  (2, \'a2+b2\', 13, 52),
  (3, \'a3+b3\', 56, 90),
  (4, \'a4+b4\', 57, 69),
  (5, \'a5+b5\', 20, 87),
  (6, \'a6+b6\', 68, 7),
  (7, \'a7+b7\', 48, 64),
  (8, \'a8+b8\', 21, 27),
  (9, \'a9+b9\', 33, 74),
  (10, \'a10+b10\', 95, 86),
  (11, \'a11+b11\', 3, 5),
  (12, \'a12+b12\', 10, 55),
  (13, \'a13+b13\', 47, 94),
  (14, \'a14+b14\', 22, 22),
  (15, \'a15+b15\', 70, 38),
  (16, \'a16+b16\', 75, 100),
  (17, \'a17+b17\', 71, 42),
  (18, \'a18+b18\', 74, 45),
  (19, \'a19+b19\', 14, 54),
  (20, \'a20+b20\', 32, 50);
';

$data->exec($insert_data);
