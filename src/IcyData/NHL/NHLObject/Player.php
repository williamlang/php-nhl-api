<?php
/**
 * src/IcyData/NHL/Object/Player.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

namespace IcyData\NHL\NHLObject;

use IcyData\NHL\NHLObject;

/**
 * Represents a Player
 *
 * @author William Lang <william@icydata.hockey>
 */
class Player extends NHLObject {

    /**
     * @inheritDoc
     */
    protected $mappings = [
        'person' => '\IcyData\NHL\Object\Person'
    ];

}
