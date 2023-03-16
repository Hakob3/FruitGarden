<?php

namespace System;

use ErrorException;

class View
{
    /**
     * @throws ErrorException
     */
    public static function render(string $path, array $data = [])
    {
        $fullPath = dirname(__DIR__) . '/Views/' . $path . '.php';

        if (!file_exists($fullPath)) {
            throw new ErrorException('View cannot be found');
        }

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }

        include($fullPath);
    }
}
