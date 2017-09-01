<?php
/**
 * Classe utilitária CLIP\Utils\OS.
 *
 * @author     Everton da Rosa <everton3x@gmail.com>
 * @package    CLIP
 * @subpackage Utils
 * @since      1.0
 */
namespace CLIP\Utils;

/**
 * Classe com utilidades relativas aos sistemas operacionais.
 */
class OS
{
    /*
     * Constantes para enumeração dos sistemas operacionais.
     */

    const OS_UNKNOW = 0;
    const OS_LINUX = 1;
    const OS_WINDOWS = 2;

    /**
     * Detecta o sistema operacional.
     *
     * @return int Retorna um inteiro para ser comparado com as constantes OS_*.
     * @see    https://stackoverflow.com/questions/738823/possible-values-for-php-os
     */
    public static function detect(): int
    {
        switch (PHP_OS) {
            case 'Linux':
                return self::OS_LINUX;
            break;
            case 'WINNT':
            case 'WIN32':
            case 'Windows':
                return self::OS_WINDOWS;
            break;
            default:
                return self::OS_UNKNOW;
            break;
        }
    }
}
