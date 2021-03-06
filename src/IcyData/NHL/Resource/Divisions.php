<?php

namespace IcyData\NHL\Resource;

use IcyData\NHL\Resource;
use IcyData\NHL\NHLObject\Division;
use IcyData\NHL\Resource\Builder\Divisions\Get;
use IcyData\NHL\Resource\Builder\Divisions\ListBuilder;

/**
 * Divisions Resource
 *
 * @author William Lang <william@icydata.hockey>
 */
class Divisions extends Resource {

    /**
     * Get a list of all Divisions
     *
     * @return Division[]
     */
    public function list() {
        return new ListBuilder($this);
    }

    /**
     * Get a list of all Divisions
     *
     * @param int $id
     * @return Division
     */
    public function get(int $id) {
        return new Get($this, $id);
    }
}