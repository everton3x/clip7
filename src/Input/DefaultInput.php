<?php

/**
 * CLIP\InputDefaultInput file
 * @package CLIP
 * @subpackage Input
 * @since 1.0
 * @author Everton da Rosa <everton3x@gmail.com>
 */
namespace CLIP\Input;

use CLIP\Input\InputInterface;

/**
 * Dafault input handler.
 *
 * This input points to PHP's STDIN.
 */
class DefaultInput implements InputInterface
{
    /** @var resource The STDIN */
    protected $resource = null;

    /**
     * The class constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        try {
            $this->resource = STDIN;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Read data from STDIN.
     *
     * This use fgets and remove last PHP_EOL;
     * @return string Return a string from STDIN with fgets.
     * @throws \Exception
     */
    public function read()
    {
        try {
            return rtrim(fgets($this->resource), "\n\r");
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Return the resource stored in self::$resource
     * @return STDINcd ..
     */
    public function getResource()
    {
        return $this->resource;
    }
}
