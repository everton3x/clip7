<?php
/**
 * CLIP\Input\InputInterface.
 *
 * @author     Everton da Rosa <everton3x@gmail.com>
 * @since      1.0
 * @package    CLIP
 * @subpackage Input
 */
namespace CLIP\Input;

/**
 * Interface para um manipulador de entrada de dados.
 *
 * Um input pode ser dados digitados no terminal, um stream, um banco de dados
 * ou qualquer outro modo de fornecer dados para o programa.
 */
interface InputInterface
{

    /**
     * Leitor padrão de dados.
     *
     * @return mixed
     */
    public function read();

    /**
     * Retorna o recurso.
     *
     * @return mixed
     */
    public function getResource();
}
