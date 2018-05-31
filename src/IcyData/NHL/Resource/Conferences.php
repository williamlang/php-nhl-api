<?php

namespace IcyData\NHL\Resource;

use IcyData\NHL\Resource;
use IcyData\NHL\Object\Conference;
use IcyData\NHL\Resource\Builder\Conferences\Get;
use IcyData\NHL\Resource\Builder\Conferences\ListBuilder;

class Conferences extends Resource {

    /**
     * Get a list of all conferences
     *
     * @return Conference[]
     */
    public function list() {
        return new ListBuilder($this);
    }

    /**
     * Get a list of all conferences
     *
     * @param int $id
     * @return Conference
     */
    public function get(int $id) {
        return new Get($this, $id);
    }
}