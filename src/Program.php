<?php
/**
* abstract class CLIP\Program file.
*
* @author Everton da Rosa <everton3x@gmail.com>
* @package CLIP
* @since 1.0
*/
namespace CLIP;

use Exception;
use CLIP\Output\OutputInterface;
use CLIP\Input\InputInterface;
use CLIP\Error\ErrorInterface;
use CLIP\Program;

/**
* Abstraction for a command line program.
*
* A program is a complete routine for performing a task.
*
* To use it, you just need to create an instance of the class that extends
* CLIP\Program to it for the magic to happen!
*
* CLIP\Program::__construct() prepares the environment and calls
* CLIP\Program::run(), which executes the program routine.
*/
abstract class Program
{
    /**
     * Abstract method that performs all the main routine of the program.
     *
     * @return void
     */

    abstract protected function run(): void;

    /** @var CLIP\InputInterface $input The input object. */
    protected $input = null;

    /** @var CLIP\Output\OutputInterface $output The output object. */
    protected $output = null;

    /** @var CLIP\Error\ErrorInterface $error The error object. */
    protected $error = null;

    /**
     * The class constructor.
     *
     * The constructor set up environment and call self::run() method.
     *
     * @param CLIP\Input\InputInterface $input The input object.
     * @param CLIP\Output\OutputInterface $output The output object.
     * @param CLIP\Error\ErrorInterface $error The error object.
     * @throws \Exception
    */
    public function __construct(InputInterface $input, OutputInterface $output, ErrorInterface $error)
    {
        try {
            /* set up environment */
            $this->input = $input;
            $this->output = $output;
            $this->error = $error;

            /* run program */
            $this->run();
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Shortcut to CLIP\Input\InputInterface::read().
     *
     * @see CLIP\Input\InputInterface::read()
     * @return mixed
     */
    protected function read()
    {
        return $this->input->read();
    }

    /**
     * Shortcut to CLIP\Output\OutputInterface::write().
     *
     * @see CLIP\Output\OutputInterface::write()
     * @param string $data The data to write into output.
     * @return CLIP\Output\OutputInterface
     */
    protected function write(string $data): OutputInterface
    {
        return $this->output->write($data);
    }

    /**
     * Shortcut to CLIP\Output\OutputInterface::nl().
     *
     * @see CLIP\Output\OutputInterface::nl()
     * @return CLIP\Output\OutputInterface
     */
    protected function nl(): OutputInterface
    {
        return $this->output->nl();
    }

    /**
     * Shortcut to CLIP\Error\ErrorInterface::info().
     *
     * @see CLIP\Error\ErrorInterface::info()
     * @param string $data The info message.
     * @return CLIP\Error\ErrorInterface
     */
    protected function info(string $data): ErrorInterface
    {
        return $this->error->info($data);
    }

    /**
     * Shortcut to CLIP\Error\ErrorInterface::alert().
     *
     * @see CLIP\Error\ErrorInterface::alert()
     * @param string $data The alert message.
     * @return CLIP\Error\ErrorInterface
     */
    protected function alert(string $data): ErrorInterface
    {
        return $this->error->alert($data);
    }

    /**
     * Shortcut to CLIP\Error\ErrorInterface::error().
     *
     * @see CLIP\Error\ErrorInterface::error()
     * @param string $data The error message.
     * @return CLIP\Error\ErrorInterface
     */
    protected function error(string $data): ErrorInterface
    {
        return $this->error->error($data);
    }

    /**
     * The class destructor.
     */
    public function __destruct()
    {
        exit(0);
    }
}