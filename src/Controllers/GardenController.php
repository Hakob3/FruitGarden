<?php

namespace App\Controllers;

use App\Seed\GardenSeeder;
use App\Service\GardenService;
use ErrorException;
use App\Models\Tree;
use App\Models\TreeType;
use System\View;

class GardenController
{
    /**
     * @return void
     * @throws ErrorException
     */
    public function run(): void
    {
        $treeType = new TreeType();
        $gardenService = new GardenService();
        $gardenSeeder = new GardenSeeder();
        $treeType->create();
        $gardenSeeder->loadTreeTypes();
        $tree = new Tree();
        $tree->create();
        $gardenSeeder->loadTrees();
        View::render('garden', [
            'fruits' => $gardenService->pickingFruitFromTrees(),
            'massUnit' => Tree::FRUIT_MASS_UNIT
        ]);
    }
}