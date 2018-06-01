<?php
/**
 * src/IcyData/NHL/Object/Division.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

namespace IcyData\NHL\Object;

use IcyData\NHL\Object;

/**
 * Represents a Division
 *
 * @author William Lang <william@icydata.hockey>
 */
class Division extends Object {

    /**
     * @inheritDoc
     */
    protected $mappings = [
        'conference' => '\IcyData\NHL\Object\Conference'
    ];
}
