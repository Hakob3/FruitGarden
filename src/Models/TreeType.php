<?php

namespace App\Models;

class TreeType extends AbstractModel
{
    /** @var string */
    private const TABLE = 'tree_type';

    /**
     * @return bool
     */
    public function create(): bool
    {
        $sql = 'CREATE TABLE `garden`.`' . self::TABLE . '` (`id` INT(11) NOT NULL AUTO_INCREMENT,
               `techName` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL, 
               `name` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
               `fruit_min_weight` INT(6) NOT NULL, `fruit_max_weight` INT(6) NOT NULL, PRIMARY KEY (`id`),
                UNIQUE `UNIQ_TYPE` (`techName`)) ENGINE = InnoDB;';

        return $this->createTable(self::TABLE, $sql);
    }
}