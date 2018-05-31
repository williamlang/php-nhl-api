<?php
/**
 * src/IcyData/NHL/Object.php
 *
 * @package    icydata/php-nhl-api
 * @author     William Lang <william@icydata.hockey>
 * @link       https://github.com/williamlang/php-nhl-api
 */

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
     * A mapping of parameter strings to the associated class
     *
     * @var array
     */
    protected $mappings = [];

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
    protected function transform(&$parameters) {
        foreach ($this->mappings as $mapping => $class) {
            if (!empty($parameters[$mapping])) {
                $parameters[$mapping] = new $class($parameters[$mapping]);
            }
        }
    }
}