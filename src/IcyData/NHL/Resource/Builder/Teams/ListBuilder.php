<?php
/**
 * src/IcyData/NHL/Resource/Builder/Teams/ListBuilder.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

namespace IcyData\NHL\Resource\Builder\Teams;

use IcyData\NHL\Exception\NHLException;
use IcyData\NHL\NHLObject\Team;
use IcyData\NHL\Resource\Builder;
use IcyData\NHL\Resource\Teams;

/**
 * Get all active teams
 *
 * @author William Lang <william@icydata.hockey>
 * @abstract This class is basically not needed until the NHL API adds search, but leaving it here in case they do
 */
class ListBuilder extends Builder {

    /**
     * Expand type
     *
     * @see src/IcyData/NHL/Resource/Teams.php
     * @var string
     */
    protected $expand;

    /**
     * What season to get data from
     *
     * @var string
     */
    protected $season;

    /**
     * Add an expand type to the request
     *
     * @see src/IcyData/NHL/Resource/Teams.php
     * @param string $expandType
     * @return ListBuilder
     */
    public function withExpand(string $expand) {
        if (!in_array($expand, [
            Teams::TYPE_NAMES,
            Teams::TYPE_ROSTER,
            Teams::TYPE_SCHEDULE_NEXT,
            Teams::TYPE_SCHEDULE_PREV,
            Teams::TYPE_STATS
        ])) {
            throw new NHLException("Invalid expand type.");
        }

        $this->expand = $expand;
        return $this;
    }

    /**
     * Get info on a specific season, ie: 2018
     *
     * @param integer $season
     * @return ListBuilder
     */
    public function withSeason(int $season) {
        if (strlen($season) > 4 || strlen($season) < 4) {
            throw new NHLException("Invalid season. Format: yyyy");
        }

        $this->season = sprintf("%d%d", $season, $season + 1);
        return $this;
    }

    /**
     * Send the request
     *
     * @return Team[]
     */
    public function send() {
        $opts = ['query' => []];

        if (!empty($this->expand)) {
            $opts['query']['expand'] = $this->expand;
        }

        if (!empty($this->season)) {
            $opts['query']['season'] = $this->season;
        }


        $url = sprintf('/api/%s/teams', $this->version);
        $json = $this->get($url, $opts);

        return array_map(function ($team) {
            return new Team($team);
        }, $json['teams']);
    }
}