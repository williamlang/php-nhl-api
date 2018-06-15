<?php
/**
 * src/IcyData/NHL/Object/DraftPick.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

namespace IcyData\NHL\Object;

use IcyData\NHL\Object;

/**
 * Represents a Draft Pick
 *
 * @author William Lang <william@icydata.hockey>
 */
class DraftPick extends Object {

    /**
     * @inheritDoc
     */
    protected $mappings = [
        'team' => '\IcyData\NHL\Object\Team',
        'prospect' => '\IcyData\NHL\Object\Prospect'
    ];
}
