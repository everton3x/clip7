<?php
/**
 * CLIP\Output\OutputInterface file
 * @package CLIP
 * @subpackage Output
 * @author Everton da Rosa <everton3x@gmail.com>
 * @since 1.0
 */
namespace CLIP\Output;

/**
 * Interface to output handler.
 *
 * An output is a feature that allows the program to send data out of it, such as writing to the
 *  terminal, a file, or a database.
 */
interface OutputInterface
{
    /**
     * Write data to output.
     *
     * @param string $data The data to write.
     * @return CLIP\Output\OutputInterface
     */
    public function write(string $data): OutputInterface;

    /**
     * Get output resource.
     * @return mixed
     */
    public function getResource();
}
