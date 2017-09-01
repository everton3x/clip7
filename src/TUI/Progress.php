<?php

/**
 * @package CLIP
 * @subpackage TUI
 * @author Everton da Rosa <everton3x@gmail.com>
 * @since 1.0
 */
namespace CLIP\TUI;

/**
 * Implementa uma barra de progresso simples
 */
class Progress extends Common
{
    /**
     *
     * @var int Valor atual do progresso. 0 ~ 100
     */
    protected $value = 0;
    
    /**
     *
     * @var int Tamanho da tela em colunas.
     */
    protected $size = 0;
    
    /**
     *
     * @var float Relação entre cada unidade percentual da barra e o número de colunas usado.
     */
    protected $ratio = 0;
    
    /**
     *
     * @var string Caracter único para desenhar a barra.
     */
    protected $char = '|';
    
    /**
     *
     * @var int Número de coluna já usado pela barra.
     */
    protected $len = 0;

    /**
     * Construtor.
     * 
     * @param int $value Valor inicial da barra. 0 ~ 100.
     * @throws \CLIP\TUI\Exception
     * @throws \Exception
     */
    public function __construct(int $value = 0)
    {
        try {
            $this->size = \CLIP\Utils\Screen::columns();
            if($this->size < 1){
                throw new \Exception('$this->size: '.$this->size);
            }else{
                $this->ratio = $this->size / 100;
            }
            $this->set($value);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    /**
     * Atualiza o tamanho da barra.
     * 
     * Admite somente atualização crescente e de valor inteiro.
     * 
     * @param int $value
     * @return void
     * @throws \CLIP\TUI\Exception
     * @throws \OutOfRangeException
     */
    public function update(int $value): void
    {
        try{
            $lastValue = $this->value;
            if($value < $lastValue){
                throw new \OutOfRangeException('$value < $lastValue: '.$value.' < '.$lastValue);
            }elseif($value === $lastValue){
                return;
            }
            
            if($value === 100){
                $increment = $this->size - $this->len;
            }else{
                $step = $value - $lastValue;
                $increment = floor($step * $this->ratio);
            }
            
            for($i = 0; $i < $increment; $i++){
                self::write($this->char);
            }
            
            $this->len += $increment;
            $this->set($value);
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Define o valor da barra.
     * 
     * @param int $value
     * @return void
     * @throws \OutOfBoundsException
     */
    protected function set(int $value): void
    {
        if($value < 0 || $value > 100){
            throw new \OutOfBoundsException('$value: '.$value);
        }
        
        $this->value = $value;
    }
}