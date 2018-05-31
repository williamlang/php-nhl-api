<?php

namespace IcyData\NHL\Resource\Builder\Conferences;

use IcyData\NHL\Resource\Builder;
use IcyData\NHL\Object\Conference;

/**
 * Get all active conferences
 *
 * @author William Lang <william@icydata.hockey>
 * @abstract This class is basically not needed until the NHL API adds search, but leaving it here in case they do
 */
class ListBuilder extends Builder {

    /**
     * Send the request
     *
     * @return Conference
     */
    public function send() {
        $url = sprintf('/api/%s/conferences', $this->version);
        $json = $this->get($url);

        return array_map(function ($conference) {
            return new Conference($conference);
        }, $json['conferences']);
    }
}