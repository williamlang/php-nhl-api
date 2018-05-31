<?php

namespace IcyData\NHL\Resource;

use IcyData\NHL\Resource;
use IcyData\NHL\Object\Team;
use IcyData\NHL\Resource\Builder\Teams\ListBuilder;
use IcyData\NHL\Resource\Builder\Teams\Get;

class Teams extends Resource {

    /**
     * Shows roster of active players for team
     */
    const TYPE_ROSTER = 'team.roster';

    /**
     * Shows only names of active players for team
     */
    const TYPE_NAMES = 'person.names';

    /**
     * Return details of team's upcoming game
     */
    const TYPE_SCHEDULE_NEXT = 'team.schedule.next';

    /**
     * Return details of team's previous game
     */
    const TYPE_SCHEDULE_PREV = 'team.schedule.previous';

    /**
     * Return team stats for the season
     */
    const TYPE_STATS = 'team.stats';

    /**
     * Get a list of all teams
     *
     * @return ListBuilder
     */
    public function list() {
        return new ListBuilder($this);
    }

    /**
     * Get a specific team by id
     *
     * @param integer $id
     * @return Get
     */
    public function get(int $id) {
        return new Get($this, $id);
    }
}
