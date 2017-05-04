<?php
/**
 * CLIP\Error\DefaultError file
 * @package CLIP
 * @subpackage Error
 * @author Everton da Rosa <everton3x@gmail.com>
 * @since 1.0
 */
namespace CLIP\Error;

use CLIP\Error\ErrorInterface;
use Exception;

/**
 * Implements the error handler to STDERR.
 */
class DefaultError implements ErrorInterface
{
    /** @var resource The STDERR */
    protected $resource = null;

    /**
     * Class constructor
     * @throws \Exception
     */
    public function __construct()
    {
        try {
            $this->resource = STDERR;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Write an info message to STDERR.
     * @param string $data The info message.
     * @return CLIP\Error\ErrorInterface
     */
    public function info(string $data): ErrorInterface
    {
        try {
            fwrite($this->resource, sprintf("[INFO\t] %s", $data));
            return $this;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Write an alert message to STDERR.
     * @param string $data The alert message.
     * @return CLIP\Error\ErrorInterface
     */
    public function alert(string $data): ErrorInterface
    {
        try {
            fwrite($this->resource, sprintf("[ALERT\t] %s", $data));
            return $this;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Write an error message to STDERR
     * @param string $data An error message.
     * @return CLIP\Error\ErrorInterface
     */
    public function error(string $data): ErrorInterface
    {
        try {
            fwrite($this->resource, sprintf("[ERROR\t] %s", $data));
            return $this;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Get STDERR resource
     * @return resource The STDERR
     */
    public function getResource()
    {
        return $this->resource;
    }
}
