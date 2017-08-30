<?php
/**
 * CLIP\Utils\Screen
 * 
 * @package CLIP
 * @subpackage Utils
 * @author Everton da Rosa <everton3x@gmail.com>
 * @since 1.0
 */
namespace CLIP\Utils;

/**
 * Utilidades relacionadas ao terminal
 */
class Screen
{

    static public function columns(): int
    {
        if (\CLIP\Utils\OS::detect() === \CLIP\Utils\OS::OS_WINDOWS) {
            exec('mode con', $output, $exit_code);
            $output_columns = preg_grep("/(col)/i", $output);
            if (count($output_columns) === 1) {
                return (int) join('', preg_replace("/[^0-9]/", "", $output_columns));
            } else {
                return 0;
            }
        } elseif (\CLIP\Utils\OS::detect() === \CLIP\Utils\OS::OS_LINUX) {
            exec('tput cols', $output, $exit_code);
            return (int) $output;
        } else {
            return 0;
        }
    }
}
