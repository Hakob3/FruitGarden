<?php

namespace Models;

use PDO;
use PDOException;

abstract class AbstractModel
{
    private const TABLE = 'tree';

    protected function createTable($table, string $sql): void
    {
        $dsn = 'mysql:host=mysql;dbname=garden';
        $pdo = new PDO(dsn: $dsn, username: 'root', password: 'password');
        try {
            $tableExists = $pdo->query('SELECT 1 FROM ' . $table . ' LIMIT 1');
        } catch (PDOException $exception) {
            $tableExists = false;
        }

        if ($tableExists === false) {
            $pdo->exec($sql);
        }
    }
}