<?php
/**
 * src/IcyData/NHL/Object/Person.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

namespace IcyData\NHL\NHLObject;

use IcyData\NHL\NHLObject;

/**
 * Represents a Person
 *
 * @author William Lang <william@icydata.hockey>
 */
class Person extends NHLObject {

    /**
     * @inheritDoc
     *
     * @var array
     */
    protected $mappings = [
        'currentTeam' => '\IcyData\NHL\NHLObject\Team'
    ];
}
