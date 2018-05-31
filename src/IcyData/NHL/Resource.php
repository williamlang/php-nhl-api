<?php
/**
 * src/IcyData/NHL/Resource.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

namespace IcyData\NHL;

use IcyData\NHL\Client;

/**
 * Resource classes will represent endpoints with the NHL API
 *
 * All resource classes will extend this one
 *
 * @author William Lang <william@icydata.hockey>
 */
abstract class Resource {

    /**
     * TSM Client
     *
     * @var Client
     */
    protected $client;

    /**
     * Constructor
     *
     * @param Client $client
     */
    public function __construct(Client $client) {
        $this->client = $client;
    }

    /**
     * Get the TSM Client
     *
     * @return Client
     */
    public function getClient() {
        return $this->client;
    }
}