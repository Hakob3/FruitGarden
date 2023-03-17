<?php

namespace App\Seed;

use PDO;

class GardenSeeder extends AbstractGardenSeeder
{
    /** @var array[]  */
    private const TYPES = [
        [
            'techName' => 'apple',
            'name' => 'Яблоня',
            'fruit_min_weight' => 150,
            'fruit_max_weight' => 180
        ],
        [
            'techName' => 'pear',
            'name' => 'Груша',
            'fruit_min_weight' => 130,
            'fruit_max_weight' => 170
        ]
    ];

    /** @var array[]  */
    private const TREES = [
        [
            'tree_type' => 'apple',
            'count' => 10,
            'min_fruits_per_tree' => 40,
            'max_fruits_per_tree' => 50
        ],
        [
            'tree_type' => 'pear',
            'count' => 15,
            'min_fruits_per_tree' => 0,
            'max_fruits_per_tree' => 20
        ]
    ];

    /**
     * @return bool
     */
    public function loadTreeTypes(): bool
    {
       return $this->fillTable(
            'tree_type',
            self::TYPES
        );
    }

    /**
     * @return bool
     */
    public function loadTrees(): bool
    {
        $data = [];

        foreach (self::TREES as $tree) {
            for ($i = 1; $i <= $tree['count']; $i++) {
                $typeId = $this->pdo->query(
                    sprintf('SELECT `id` FROM `tree_type` WHERE `techName` = "%s";', $tree['tree_type'])
                )->fetch(PDO::FETCH_ASSOC);

                $data[] = [
                    'tree_type' => $typeId['id'],
                    'fruit_count' => rand($tree['min_fruits_per_tree'], $tree['max_fruits_per_tree'])
                ];
            }
        }
        return $this->fillTable('tree', $data);
    }
}