<?php
/**
 * CLIP\Error\ErrorInterface
 *
 * @package    CLIP
 * @subpackage Error
 * @author     Everton da Rosa <everton3x@gmail.com>
 * @since      1.0
 */
namespace CLIP\Error;

/**
 * Interface para um manipulador de erros.
 *
 * O manipulador de erros trata também de alertas e mensagens informativas, tendo a função de log do programa.
 */
interface ErrorInterface
{

    /**
     * Escreve uma mensagem informativa.
     *
     * @param  string $data A mensagem.
     * @return CLIP\Error\ErrorInterface
     */
    public function info(string $data): ErrorInterface;

    /**
     * Escreve um aviso/alerta.
     *
     * @param  string $data O alerta/aviso.
     * @return CLIP\Error\ErrorInterface
     */
    public function alert(string $data): ErrorInterface;

    /**
     * Escreve um erro.
     *
     * @param  string $data O erro.
     * @return CLIP\Error\ErrorInterface
     */
    public function error(string $data): ErrorInterface;

    /**
     * Retorna o recurso.
     *
     * @return mixed
     */
    public function getResource();
}
