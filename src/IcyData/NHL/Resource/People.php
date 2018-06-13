<?php

namespace IcyData\NHL\Resource;

use IcyData\NHL\Resource;
use IcyData\NHL\Object\Person;
use IcyData\NHL\Resource\Builder\People\Get;

class People extends Resource {

    /**
     * Get a specific person by id
     *
     * @param integer $id
     * @return Get
     */
    public function get(int $id) {
        return new Get($this, $id);
    }
}
