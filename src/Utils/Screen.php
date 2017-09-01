<?php
/**
 * CLIP\Utils\Screen
 *
 * @package    CLIP
 * @subpackage Utils
 * @author     Everton da Rosa <everton3x@gmail.com>
 * @since      1.0
 */
namespace CLIP\Utils;

/**
 * Utilidades relacionadas ao terminal
 */
class Screen
{

    public static function columns(): int
    {
        if (\CLIP\Utils\OS::detect() === \CLIP\Utils\OS::OS_WINDOWS) {
            exec('mode con', $output, $exitCode);
            $outputColumns = preg_grep("/(col)/i", $output);
            if (count($outputColumns) === 1) {
                return (int) join('', preg_replace("/[^0-9]/", "", $outputColumns));
            } else {
                return 0;
            }
        } elseif (\CLIP\Utils\OS::detect() === \CLIP\Utils\OS::OS_LINUX) {
            exec('tput cols', $output, $exitCode);
            return (int) join('', $output);
        } else {
            return 0;
        }
    }
}
