<?php

namespace App\Seed;

use PDO;
use PDOException;

abstract class AbstractGardenSeeder
{
    /** @var PDO  */
    protected PDO $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=mysql;dbname=garden';
        $this->pdo = new PDO(dsn: $dsn, username: 'root', password: 'password');
    }
    protected function fillTable(string $table, array $data): bool
    {
        $tableColumns = array_keys($data[0]);
        $stmt = $this->pdo->prepare(
            sprintf(
                'INSERT INTO %s (%s) VALUES (:%s);',
                $table,
                implode(', ', $tableColumns),
                implode(', :', $tableColumns)
            )
        );
        try {
            $this->pdo->beginTransaction();
            foreach ($data as $row) {
                $stmt->execute($row);
            }
            $this->pdo->commit();

            return true;
        } catch (PDOException $exception) {
            $this->pdo->rollBack();
            throw $exception;
        }
    }
}