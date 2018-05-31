<?php

namespace IcyData\NHL\Resource;

use GuzzleHttp\Exception\ClientException;
use IcyData\NHL\Exception\NHLException;
use IcyData\NHL\Resource;
use Symfony\Component\HttpFoundation\Response;

/**
 * Builder class used by resources for creating requests to the NHL API
 *
 * @author William Lang <william@icydata.hockey>
 */
abstract class Builder {

    /**
     * The resource this builder is for
     *
     * @var Resource
     */
    protected $resource;

    /**
     * Guzzle client. Private because there are helper methods
     * that will handle exceptions
     *
     * @var \GuzzleHttp\Client
     */
    private $guzzle;

    /**
     * Constructor
     *
     * @param Resource $resource
     */
    public function __construct(Resource $resource) {
        $this->resource = $resource;
        $this->version = $resource->getClient()->getVersion();
        $this->guzzle = $resource->getClient()->getGuzzle();
    }

    /**
     * Get request to the Guzzle client
     *
     * @param string $url
     * @param array $opts
     * @return array
     */
    protected function get(string $url, array $opts = array()) {
        try {
            $response = $this->guzzle->get($url);
            $json = json_decode((string)$response->getBody(), true);
            return $json;
        } catch (ClientException $e) {
            throw NHLException::createFromClientException($e);
        }
    }

    /**
     * Send the request that the builder is using
     *
     * @return mixed
     */
    abstract function send();
}