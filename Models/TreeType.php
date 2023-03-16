<?php

namespace Models;

use PDO;

class TreeType
{
    public function createTable(): bool|int
    {
        $dsn = 'mysql:host=mysql;dbname=garden';
        $pdo = new PDO(dsn: $dsn, username: 'root', password: 'password');
        $sql = 'CREATE TABLE `garden`.`tree_type` (`id` INT(11) NOT NULL AUTO_INCREMENT, `fruit_min_weight` INT(6) NOT NULL, `fruit_max_weight` INT(6) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;';

        return $pdo->exec($sql);
    }

    public function fillTable(): bool|int
    {
        $dsn = 'mysql:host=mysql;dbname=garden';
        $pdo = new PDO(dsn: $dsn, username: 'root', password: 'password');
        $sql = 'CREATE TABLE `garden`.`tree_type` (`id` INT(11) NOT NULL AUTO_INCREMENT, `fruit_min_weight` INT(6) NOT NULL, `fruit_max_weight` INT(6) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;';

        return $pdo->exec($sql);
    }
}