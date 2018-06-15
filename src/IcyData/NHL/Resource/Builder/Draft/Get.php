<?php
/**
 * src/IcyData/NHL/Resource/Builder/Draft/Get.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

namespace IcyData\NHL\Resource\Builder\Draft;

use IcyData\NHL\Object\DraftPick;
use IcyData\NHL\Resource;
use IcyData\NHL\Resource\Builder;

/**
 * Get a draft year
 *
 * @author William Lang <william@icydata.hockey>
 */
class Get extends Builder {

    /**
     * The year of the draft
     *
     * @var int
     */
    protected $year;

    /**
     * Constructor
     *
     * @param Resource $resource
     * @param int $year
     */
    public function __construct(Resource $resource, int $year) {
        parent::__construct($resource);
        $this->withYear($year);
    }

    /**
     * Set the id of the builder
     *
     * @param int $year
     * @return Get
     */
    public function withYear(int $year) {
        $this->year = $year;
        return $this;
    }

    /**
     * Send the request
     *
     * @return Person
     */
    public function send() {
        $url = sprintf('/api/%s/draft/%d', $this->version, $this->year);
        $json = $this->get($url);

        $rounds = $json['drafts'][0]['rounds'];

        $draftPicks = [];

        foreach ($rounds as $round) {
            $draftPicks = array_map(function($pick) {
                return new DraftPick($pick);
            }, $round['picks']);
        }

        return $draftPicks;
    }
}