<?php
/**
 * Arquivo da classe CLIP\Utils\Utils
 *
 * @package    CLIP
 * @subpackage Utils
 * @author     Everton da Rosa <everton3x@gmail.com>
 * @since      1.0
 */
namespace CLIP\Utils;

/**
 * Classe com utilidades diversas.
 */
class Utils
{

    /**
     * Verifica se a execução está sendo feita pela SAPI CLI.
     *
     * @see    http://php.net/manual/pt_BR/function.php-sapi-name.php
     * @return bool
     */
    public static function isCLI(): bool
    {
        if (PHP_SAPI === 'cli') {
            return true;
        } else {
            return false;
        }
    }
}
