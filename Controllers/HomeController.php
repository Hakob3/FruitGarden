<?php

namespace Controllers;

use ErrorException;
use Models\TreeType;
use System\View;

class HomeController
{
    public function index(): void
    {
        echo 'home';
    }

    /**
     * @throws ErrorException
     */
    public function main(): void
    {
        $treeType = new TreeType();
        $treeType->createTable();

        View::render('index');
    }
}