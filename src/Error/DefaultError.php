<?php
/**
 * CLIP\Error\DefaultError
 *
 * @package    CLIP
 * @subpackage Error
 * @author     Everton da Rosa <everton3x@gmail.com>
 * @since      1.0
 */
namespace CLIP\Error;

use CLIP\Error\ErrorInterface;
use Exception;

/**
 * Implementa um manipualdor de erros com STDERR.
 */
class DefaultError implements ErrorInterface
{

    /**
     *
     *
     * @var resource STDERR
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
            $this->resource = STDERR;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Escreve uma mensagem informativa para STDERR.
     *
     * @param  string $data A mensagem.
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
     * Escreve um aviso/alerta para STDERR.
     *
     * @param  string $data O alerta/aviso.
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
     * Escreve o erro para STDERR.
     *
     * @param  string $data O erro.
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
     * Retorna STDERR.
     *
     * @return resource The STDERR
     */
    public function getResource()
    {
        return $this->resource;
    }
}
