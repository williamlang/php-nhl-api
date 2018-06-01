<?php
/**
 * src/IcyData/NHL/Object/Team.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

namespace IcyData\NHL\Object;

use IcyData\NHL\Object;

/**
 * Represents a Team
 *
 * @author William Lang <william@icydata.hockey>
 */
class Team extends Object {

    /**
     * @inheritDoc
     */
    protected $mappings = [
        'conference' => '\IcyData\NHL\Object\Conference',
        'division'   => '\IcyData\NHL\Object\Division',
        'franchise'  => '\IcyData\NHL\Object\Franchise',
        'venue'      => '\IcyData\NHL\Object\Venue'
    ];
}
