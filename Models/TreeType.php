<?php

namespace Models;

use PDO;
use PDOException;

class TreeType extends AbstractModel
{
    private const TABLE = 'tree_type';

    private const TYPES = [
        'apple' => [
            'min_weight' => '150',
            'max_weight' => '180'
        ],
        'pear' => [
            'min_weight' => '130',
            'max_weight' => '170'
        ]
    ];

    public function create(): void
    {
        $sql = 'CREATE TABLE `garden`.`' . self::TABLE . '` (`id` INT(11) NOT NULL AUTO_INCREMENT, `type` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL, `fruit_min_weight` INT(6) NOT NULL, `fruit_max_weight` INT(6) NOT NULL, PRIMARY KEY (`id`), UNIQUE `UNIQ_TYPE` (`type`)) ENGINE = InnoDB;';
        $this->createTable(self::TABLE, $sql);
    }

    public function fillTable(): bool
    {
        $dsn = 'mysql:host=mysql;dbname=garden';
        $pdo = new PDO(dsn: $dsn, username: 'root', password: 'password');

        $stmt = $pdo->prepare(
            'INSERT INTO ' . self::TABLE . '(type, fruit_min_weight, fruit_max_weight) VALUES (?, ?, ?);'
        );

        try {
            $pdo->beginTransaction();
            foreach (self::TYPES as $type => $weights) {
                $stmt->execute([$type, $weights['min_weight'], $weights['max_weight']]);
            }
            $pdo->commit();

            return true;
        } catch (PDOException $exception) {
            $pdo->rollBack();
            throw $exception;
        }
    }
}