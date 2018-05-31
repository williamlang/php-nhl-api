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
use IcyData\NHL\Object\Conference;

/**
 * Represents a Division
 *
 * @author William Lang <william@icydata.hockey>
 */
class Division extends Object {

    /**
     * Transform incoming parameters if need be
     *
     * @param array $parameters
     * @return void
     */
    protected function transform(&$parameters) {
        $parameters['conference'] = new Conference($parameters['conference']);
    }
}
