<?php

namespace App\Models;

use PDO;
use PDOException;

abstract class AbstractModel
{
    /** @var PDO  */
    protected PDO $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=mysql;dbname=garden';
        $this->pdo = new PDO(dsn: $dsn, username: 'root', password: 'password');
    }

    /**
     * @param $table
     * @param string $sql
     * @return void
     */
    protected function createTable($table, string $sql): void
    {
        try {
            $tableExists = $this->pdo->query('SELECT 1 FROM ' . $table . ' LIMIT 1');
        } catch (PDOException $exception) {
            $tableExists = false;
        }

        if ($tableExists !== false) {
            $this->pdo->exec('SET FOREIGN_KEY_CHECKS = 0;');
            $this->pdo->exec(sprintf('DROP TABLE %s', $table));
            $this->pdo->exec('SET FOREIGN_KEY_CHECKS = 1;');
        }

        $this->pdo->exec($sql);
    }
}