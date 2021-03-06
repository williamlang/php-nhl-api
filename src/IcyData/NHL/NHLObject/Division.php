<?php
/**
 * src/IcyData/NHL/Object/Division.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

namespace IcyData\NHL\NHLObject;

use IcyData\NHL\NHLObject;

/**
 * Represents a Division
 *
 * @author William Lang <william@icydata.hockey>
 */
class Division extends NHLObject {

    /**
     * @inheritDoc
     */
    protected $mappings = [
        'conference' => '\IcyData\NHL\NHLObject\Conference'
    ];
}
