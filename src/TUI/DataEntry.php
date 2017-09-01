<?php
/**
 * @package CLIP
 * @subpackage TUI
 * @author Everton da Rosa <everton3x@gmail.com>
 * @since 1.0
 */
namespace CLIP\TUI;

/**
 * Implementa elementos de Text User Interface para entrada de dados.
 * 
 * Funciona diretamente sobre STDIN e STDOUT
 */
class DataEntry extends Common
{

    /**
     * Fornece um prompt para digitação pelo usuário.
     * 
     * @param string $message Uma mensagem opcional para ser exibida antes do
     *  prompt.
     * @return string Retorna os dados deigitados
     */
    public static function prompt(string $message = ''): string
    {
        self::write($message);
        return (string) self::read();
    }

    /**
     * Exibe um menu de opções e retorna a opção selecionada.
     * 
     * O menu retorna a chave do item do array selecionado ou null se o valor 
     * fornecido não for uma das chaves existentes.
     * 
     * Se for possível determinar o número de oclunas do terminal e se esse 
     * valor for superior à largura do maior item do menu mais 8 caracteres, o 
     * menu é centralizado e exibe bordas, caso contrário um menu simples é 
     * mostrado.
     * 
     * @param array $items O conjunto de opções, onde as chaves são os valores 
     * para escolha que será devolvido.
     * @param string $title Um título opcional para o menu.
     * @param string $promptMessage Uma mensagem opcional para o prompt de 
     * escolha.
     * @return string|null Retorna a chave do item digitado ou null se o que 
     * for digitado não for uma chave válida.
     */
    public static function menu(
        array $items, string $title = null, string $promptMessage = ''
    ): ?string {
        $maxLen = self::detectMaxLenItems(array_keys($items)) + self::detectMaxLenItems($items);
        if (\CLIP\Utils\Screen::columns() > ($maxLen + 8)) {
            $choice = self::graphicMenu($items, $title, $promptMessage);
        } else {
            $choice = self::onlyTextMenu($items, $title, $promptMessage);
        }

        return $choice;
    }
    
    /**
     * Monta o menu "gráfico".
     * 
     * @param array $items
     * @param string $title
     * @param string $promptMessage
     * @return string|null
     */
    protected static function graphicMenu(
        array $items, string $title = null, string $promptMessage
    ): ?string {
        //define tamanhos
        $screenLen = \CLIP\Utils\Screen::columns();
        $keyLen = self::detectMaxLenItems(array_keys($items));
        $titleLen = mb_strlen($title);
        $labelLen = self::detectMaxLenItems($items);
        $menuLen = ($titleLen > ($keyLen + $labelLen + 3))? $titleLen : ($keyLen + $labelLen + 3);
        $leftBorderLen = floor(($screenLen - $menuLen - 4) / 2);
        $rightBorderLen = $screenLen - $leftBorderLen - $menuLen - 4;
        
        //define strings cosntantes
        $strLeftMargin = self::mbStrPad('', $leftBorderLen, ' ');
        $strRightMargin = self::mbStrPad('', $rightBorderLen, ' ');
        $charBorderCornerTopLeft = chr(self::BORDER_CORNER_TOP_LEFT);
        $charBorderCornerTopRight = chr(self::BORDER_CORNER_TOP_RIGHT);
        $charBorderCornerBottomLeft = chr(self::BORDER_CORNER_BOTTOM_LEFT);
        $charBorderCornerBottomRight = chr(self::BORDER_CORNER_BOTTOM_RIGHT);
        $charBorderHorizontal = chr(self::BORDER_HORIZONTAL);
        $charBorderVertical = chr(self::BORDER_VERTICAL);
        $strBorderHorizontal = $strLeftMargin.$charBorderCornerTopLeft.self::mbStrPad('', $menuLen + 2, $charBorderHorizontal).$charBorderCornerTopRight.$strRightMargin;
        $strLineHorizontal = $strLeftMargin.$charBorderVertical.self::mbStrPad('', $menuLen + 2, $charBorderHorizontal).$charBorderVertical.$strRightMargin;
        
        //borda superior
        self::write($strBorderHorizontal);
        //título
        if(!is_null($title) && mb_strlen($title) > 0){
            $strTitle = "$strLeftMargin$charBorderVertical ".self::mbStrPad($title, $menuLen, STR_PAD_BOTH)." $charBorderVertical$strRightMargin";
            self::write($strTitle);
            self::write($strLineHorizontal);
        }
        
        //itens
        foreach ($items as $key => $label){
            $keyf = '['.self::mbStrPad($key, $keyLen, ' ', STR_PAD_LEFT).']';
            $labelf = self::mbStrPad($label, $menuLen - $keyLen - 3, ' ', STR_PAD_RIGHT);
            $strLineItem = "$strLeftMargin$charBorderVertical $keyf $labelf $charBorderVertical$strRightMargin";
            self::write($strLineItem);
        }
        
        //borda inferior
        self::write($strBorderHorizontal);
        
        return (string) self::prompt($promptMessage);
    }
    
    /**
     * Mostra o menu simples.
     * 
     * @param array $items
     * @param string $title
     * @param string $promptMessage
     * @return string|null
     * 
     */
    protected static function onlyTextMenu(array $items, string $title = null, string $promptMessage): ?string
    {
        if (!is_null($title)) {
            self::write($title.PHP_EOL);
        }
        $maxLenKeys = self::detectMaxLenItems(array_keys($items));
        foreach ($items as $key => $label) {
            $keyf = self::mbStrPad($key, $maxLenKeys, ' ', STR_PAD_LEFT);
            self::write("[$keyf]\t$label" . PHP_EOL);
        }

        self::write(PHP_EOL);
        $choice = self::prompt($promptMessage);

        if (key_exists($choice, $items)) {
            return (string) $choice;
        } else {
            return null;
        }
    }

    /**
     * Descobre qual dos itens tem a maior largura em caracteres.
     * 
     * @param array $items
     * @return int
     */
    protected static function detectMaxLenItems(array $items): int
    {
        $maxLen = 0;
        foreach ($items as $value) {
            $len = mb_strlen($value);
            if ($len > $maxLen) {
                $maxLen = $len;
            }
        }

        return $maxLen;
    }
    
    /**
     * Versão multibyte de str_pad().
     * Obrigado e créditos a  wes@nospamplsexample.org
     * @see https://secure.php.net/manual/pt_BR/function.str-pad.php#116244
     * @param string $str
     * @param int $pad_len
     * @param string $pad_str
     * @param int $dir
     * @param string $encoding
     * @return string
     */
    protected static function mbStrPad(string $str, int $pad_len, string $pad_str = ' ', int $dir = STR_PAD_RIGHT, string $encoding = NULL)
    {
        $encoding = $encoding === NULL ? mb_internal_encoding() : $encoding;
        $padBefore = $dir === STR_PAD_BOTH || $dir === STR_PAD_LEFT;
        $padAfter = $dir === STR_PAD_BOTH || $dir === STR_PAD_RIGHT;
        $pad_len -= mb_strlen($str, $encoding);
        $targetLen = $padBefore && $padAfter ? $pad_len / 2 : $pad_len;
        $strToRepeatLen = mb_strlen($pad_str, $encoding);
        $repeatTimes = ceil($targetLen / $strToRepeatLen);
        $repeatedString = str_repeat($pad_str, max(0, $repeatTimes)); // safe if used with valid utf-8 strings
        $before = $padBefore ? mb_substr($repeatedString, 0, floor($targetLen), $encoding) : '';
        $after = $padAfter ? mb_substr($repeatedString, 0, ceil($targetLen), $encoding) : '';
        return $before . $str . $after;
    }
}
