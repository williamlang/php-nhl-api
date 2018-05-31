<?php

namespace IcyData\NHL;

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Abstract class that extends the Symfony ParameterBag
 *
 * Objects in the NHL API will extend this abstract class.
 *
 * @author William Lang <william@icydata.hockey>
 */
abstract class Object extends ParameterBag {

    /**
     * Object Constructor
     *
     * @param array $parameters An array of parameters
     */
    public function __construct(array $parameters = array()) {
        $this->transform($parameters);
        parent::__construct($parameters);
    }

    /**
     * Any transformations that needs to be done on parameters passed to the constructor
     *
     * @param array $parameters
     * @return void
     */
    abstract protected function transform(&$parameters);
}