<?php
/**
 * src/IcyData/NHL/Object/DraftPick.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

namespace IcyData\NHL\NHLObject;

use IcyData\NHL\NHLObject;

/**
 * Represents a Draft Pick
 *
 * @author William Lang <william@icydata.hockey>
 */
class DraftPick extends NHLObject {

    /**
     * @inheritDoc
     */
    protected $mappings = [
        'team'     => '\IcyData\NHL\NHLObject\Team',
        'prospect' => '\IcyData\NHL\NHLObject\Prospect'
    ];
}
