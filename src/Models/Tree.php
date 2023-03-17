<?php

namespace App\Models;

use PDO;

class Tree extends AbstractModel
{
    /** @var string */
    private const TABLE = 'tree';

    /** @var string */
    public const FRUIT_MASS_UNIT = 'гр.';

    /**
     * @return bool
     */
    public function create(): bool
    {
        $sql = 'CREATE TABLE `garden`.`' . self::TABLE . '` (`id` INT(11) NOT NULL AUTO_INCREMENT,
         `tree_type` INT(11) NOT NULL, `fruit_count` INT(6),
          PRIMARY KEY (`id`), CONSTRAINT `FK_TREE_TYPE` FOREIGN KEY (`tree_type`) REFERENCES `tree_type`(`id`)
          ON DELETE CASCADE
           ) ENGINE = InnoDB;';

        return $this->createTable(self::TABLE, $sql);
    }
}