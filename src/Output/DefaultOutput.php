<?php
/**
 * CLIP\Output\DefaultOutput file
 * @package CLIP
 * @subpackage Output
 * @author Everton da Rosa <everton3x@gmail.com>
 * @since 1.0
 */
namespace CLIP\Output;

use CLIP\Output\OutputInterface;
use Exception;

/**
 * Implements an output to STDOUT.
 */
class DefaultOutput implements OutputInterface
{

    /** @var resource The STDOUT */
    protected $resource = null;

    /**
     * Output constructor
     * @throws \Exception
     */
    public function __construct()
    {
        try {
            $this->resource = STDOUT;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Write data to STDOUT.
     * @param string $data The data to write using fwrite.
     * @return CLIP\Output\OutputInterface
     */
    public function write(string $data): OutputInterface
    {
        fwrite($this->getResource(), $data);
        return $this;
    }

    /**
     * Write in STDOUT a new line with PHP_EOL.
     * @return CLIP\Output\OutputInterface
     */
    public function nl(): OutputInterface
    {
        fwrite($this->getResource(), PHP_EOL);
        return $this;
    }

    /**
     * Get STDOUT resource.
     * @return resource The STDOUT.
     */
    public function getResource()
    {
        return $this->resource;
    }
}
