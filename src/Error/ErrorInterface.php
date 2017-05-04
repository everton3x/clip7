<?php
/**
 * CLIP\Error\ErrorInterface file
 * @package CLIP
 * @subpackage Error
 * @author Everton da Rosa <everton3x@gmail.com>
 * @since 1.0
 */
namespace CLIP\Error;

/**
 * Interface to error handler.
 *
 * The error is used to log errors, alert/warning and info messages.
 */
interface ErrorInterface
{
    /**
     * Write an info message.
     * @param string $data the info message.
     * @return CLIP\Error\ErrorInterface
     */
    public function info(string $data): ErrorInterface;

    /**
     * Write an alert/warning message.
     * @param string $data The alert/warning message.
     * @return CLIP\Error\ErrorInterface
     */
    public function alert(string $data): ErrorInterface;

    /**
     * Write an error message.
     * @param string $data the error message.
     * @return CLIP\Error\ErrorInterface
     */
    public function error(string $data): ErrorInterface;

    /**
     * Get the error resource.
     * @return mixed
     */
    public function getResource();
}
