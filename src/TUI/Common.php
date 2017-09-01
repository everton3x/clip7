<?php

/**
 * @package CLIP
 * @subpackage TUI
 * @author Everton da Rosa <everton3x@gmail.com>
 * @since 1.0
 */

namespace CLIP\TUI;

/**
 * Membros comuns para text user interface.
 */
class Common
{
    /**
     * Código ASCII para bordas.
     */
    protected const BORDER_CORNER_TOP_LEFT = 43;
    protected const BORDER_CORNER_BOTTOM_LEFT = 43;
    protected const BORDER_CORNER_BOTTOM_RIGHT = 43;
    protected const BORDER_CORNER_TOP_RIGHT = 43;
    protected const BORDER_HORIZONTAL = 45;
    protected const BORDER_VERTICAL = 124;
    
    /**
     * Escreve para STDOUT.
     * 
     * @param string $data
     * @return void
     */
    protected static function write(string $data): void
    {
        fwrite(STDOUT, $data);
    }
    
    /**
     * Lê a partir de STDIN.
     * 
     * @return string
     */
    protected static function read(): string
    {
        return (string) trim(fgets(STDIN));
    }
}