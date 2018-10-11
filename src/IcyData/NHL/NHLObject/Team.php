<?php
/**
 * src/IcyData/NHL/Object/Team.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

namespace IcyData\NHL\NHLObject;

use IcyData\NHL\NHLObject;

/**
 * Represents a Team
 *
 * @author William Lang <william@icydata.hockey>
 */
class Team extends NHLObject {

    /**
     * @inheritDoc
     */
    protected $mappings = [
        'conference' => '\IcyData\NHL\NHLObject\Conference',
        'division'   => '\IcyData\NHL\NHLObject\Division',
        'franchise'  => '\IcyData\NHL\NHLObject\Franchise',
        'roster'     => '\IcyData\NHL\NHLObject\Roster',
        'venue'      => '\IcyData\NHL\NHLObject\Venue'
    ];
}
