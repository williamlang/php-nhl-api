<?php

namespace IcyData\NHL\Exception;

use GuzzleHttp\Exception\ClientException;

/**
 * All NHLExceptions will either use this class or extend this clas
 *
 * @author William Lang <william@icydata.hockey>
 */
class NHLException extends \Exception {

    /**
     * Create a TSM Exception from a ClientException
     *
     * @param ClientException $e
     * @return NHLException
     */
    public static function createFromClientException(ClientException $e) {
        $json = json_decode($e->getResponse()->getBody()->__toString(), true);
        return new NHLException($json['message'], $json['messageNumber']);
    }
}