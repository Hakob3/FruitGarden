<?php

namespace Controllers;

use ErrorException;
use Models\TreeType;
use System\View;

class GardenController
{
    public function index(): void
    {
        echo 'home';
    }

    /**
     * @throws ErrorException
     */
    public function run(): void
    {
        $treeType = new TreeType();
        $treeType->create();
        $treeType->fillTable();

        View::render('main');
    }
}