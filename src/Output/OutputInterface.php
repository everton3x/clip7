<?php
/**
 * CLIP\Output\OutputInterface
 *
 * @package    CLIP
 * @subpackage Output
 * @author     Everton da Rosa <everton3x@gmail.com>
 * @since      1.0
 */
namespace CLIP\Output;

/**
 * Interface para saída de dados do programa.
 *
 * Um output provê meios de o programa retornar dados, seja para o terminal,
 *  um, arquivo, ou banco de dados, por exemplo.
 */
interface OutputInterface
{

    /**
     * Escritor de dados padrão.
     *
     * @param  string $data Os dados para escrever.
     * @return CLIP\Output\OutputInterface
     */
    public function write(string $data): OutputInterface;

    /**
     * Retorna o recurso.
     *
     * @return mixed
     */
    public function getResource();
}
