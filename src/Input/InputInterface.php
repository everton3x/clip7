<?php
/**
 * CLIP\Input\InputInterface file.
 * @author Everton da Rosa <everton3x@gmail.com>
 * @since 1.0
 * @package CLIP
 * @subpackage Input
 */
namespace CLIP\Input;

/**
 * Interface to input handler.
 *
 * An input can be the terminal itself, a file, a stream, a database, or anything else that provides
 *  data for the program.
 */
interface InputInterface
{
    /**
     * Read data from input.
     * @return mixed
     */
    public function read();

    /**
     * Return the input resource.
     * @return mixed
     */
    public function getResource();
}
