<?php

namespace App\Service;

use PDO;

class GardenService
{
    /** @var PDO */
    private PDO $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=mysql;dbname=garden';
        $this->pdo = new PDO(dsn: $dsn, username: 'root', password: 'password');
    }

    /**
     * @return bool|array
     */
    public function pickingFruitFromTrees(): bool|array
    {
        return $this->pdo->query(
            'SELECT tree_type.name, SUM(tree.fruit_count) AS total_fruit_count_by_type, 
            ((tree_type.fruit_min_weight + tree_type.fruit_min_weight)/2) * SUM(tree.fruit_count)
            AS total_fruit_weight_by_type, COUNT(tree.id) AS tree_count_by_type
            FROM tree_type
            LEFT JOIN tree
            ON tree_type.id=tree.tree_type
            GROUP BY tree.tree_type'
        )->fetchAll(PDO::FETCH_ASSOC);
    }
}