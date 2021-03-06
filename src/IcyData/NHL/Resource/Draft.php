<?php

namespace IcyData\NHL\Resource;

use IcyData\NHL\Resource;
use IcyData\NHL\Resource\Builder\Draft\Get;

/**
 * Draft Resource
 *
 * @author William Lang <william@icydata.hockey>
 */
class Draft extends Resource {

    /**
     * Get a list of all players in the draft year
     *
     * @param int $year
     * @return Get
     */
    public function get(int $year) {
        return new Get($this, $year);
    }
}