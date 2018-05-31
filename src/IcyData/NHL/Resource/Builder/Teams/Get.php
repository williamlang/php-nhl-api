<?php
/**
 * src/IcyData/NHL/Resource/Builder/Teams/Get.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

namespace IcyData\NHL\Resource\Builder\Teams;

use IcyData\NHL\Object\Team;
use IcyData\NHL\Resource\Builder;
use IcyData\NHL\Resource\Teams;

/**
 * Get a specific team
 *
 * @author William Lang <william@icydata.hockey>
 */
class Get extends Builder {

    /**
     * The id of the team
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
     * @return Team
     */
    public function send() {
        $url = sprintf('/api/%s/teams/%d', $this->version, $this->id);
        $json = $this->get($url);
        return new Team($json['teams'][0]);
    }
}