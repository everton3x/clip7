<?php
/**
 * CLIP\Output\DefaultOutput
 *
 * @package    CLIP
 * @subpackage Output
 * @author     Everton da Rosa <everton3x@gmail.com>
 * @since      1.0
 */
namespace CLIP\Output;

use CLIP\Output\OutputInterface;
use Exception;

/**
 * implementa um output padrão usando STDOUT.
 */
class DefaultOutput implements OutputInterface
{

    /**
     *
     *
     * @var resource STDOUT
     */
    protected $resource = null;

    /**
     * Construtor.
     *
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
     * Escreve dados para STDOUT.
     *
     * @param  string $data Os dados para serem escritos.
     * @return CLIP\Output\OutputInterface
     */
    public function write(string $data): OutputInterface
    {
        fwrite($this->getResource(), $data);
        return $this;
    }

    /**
     * Escreve uma quebra de linha ao final com PHP_EOL.
     *
     * @return CLIP\Output\OutputInterface
     */
    public function eol(): OutputInterface
    {
        fwrite($this->getResource(), PHP_EOL);
        return $this;
    }

    /**
     * Retorna STDOUT.
     *
     * @return resource STDOUT.
     */
    public function getResource()
    {
        return $this->resource;
    }
}
