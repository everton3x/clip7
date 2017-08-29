<?php
/**
 * CLIP\InputDefaultInput
 *
 * @package    CLIP
 * @subpackage Input
 * @since      1.0
 * @author     Everton da Rosa <everton3x@gmail.com>
 */
namespace CLIP\Input;

use CLIP\Input\InputInterface;

/**
 * Input padrão.
 *
 * Usa STDIN do PHP para entrada de dados.
 */
class DefaultInput implements InputInterface
{

    /**
     *
     *
     * @var resource STDIN
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
            $this->resource = STDIN;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Lê dados de STDIN.
     *
     * Isto usa fgets e remove a última quebra de linha representada por PHP_EOL.
     *
     * @return string Retorna a string lida de STDIN com fgets e processada com rtrim..
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
     * Retorna o recurso armazenado em self::$resource
     *
     * @return STDIN
     */
    public function getResource()
    {
        return $this->resource;
    }
}
