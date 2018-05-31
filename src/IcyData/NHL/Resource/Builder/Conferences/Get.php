<?php

namespace IcyData\NHL\Resource\Builder\Conferences;

use IcyData\NHL\Object\Conference;
use IcyData\NHL\Resource;
use IcyData\NHL\Resource\Builder;

/**
 * Get a specific conference
 *
 * @author William Lang <william@icydata.hockey>
 */
class Get extends Builder {

    /**
     * The id of the conference
     *
     * @var int
     */
    protected $id;

    /**
     * Constructor
     *
     * @param Resource $resource
     * @param int $id
     */
    public function __construct(Resource $resource, int $id) {
        parent::__construct($resource);
        $this->withId($id);
    }

    /**
     * Set the id of the builder
     *
     * @param int $id
     * @return Get
     */
    public function withId(int $id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Send the request
     *
     * @return Conference
     */
    public function send() {
        $url = sprintf('/api/%s/conferences/%d', $this->version, $this->id);
        $json = $this->get($url);
        return new Conference($json['conferences'][0]);
    }
}