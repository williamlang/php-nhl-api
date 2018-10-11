<?php
/**
 * src/IcyData/NHL/Resource/Builder/Divisions/Get.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

namespace IcyData\NHL\Resource\Builder\Divisions;

use IcyData\NHL\NHLObject\Division;
use IcyData\NHL\Resource;
use IcyData\NHL\Resource\Builder;

/**
 * Get a specific Division
 *
 * @author William Lang <william@icydata.hockey>
 */
class Get extends Builder {

    /**
     * The id of the Division
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
     * @return Division
     */
    public function send() {
        $url = sprintf('/api/%s/divisions/%d', $this->version, $this->id);
        $json = $this->get($url);
        return new Division($json['divisions'][0]);
    }
}