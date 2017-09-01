<?php
/**
 * @package CLIP
 * @subpackage Input
 * @author Everton da Rosa <everton3x@gmail.com>
 * @since 1.0
 */
namespace CLIP\Input;

/**
 * Implementa a configuração para argumentos de linha de comando para os programas
 */
class Option
{

    /*
     * Constantes para definir se a opção não recebe valor, ou se recebe, se
     * ele é opcional ou requerido.
     */
    const NO_VALUE = 0;
    const REQUIRED_VALUE = 1;
    const OPTIONAL_VALUE = 2;
    /**
     *
     * @var string O nome do argumento
     */
    protected $name;

    /**
     *
     * @var bool Indica se um valor é requerido.
     */
    protected $requireValue = 0;

    /**
     *
     * @var callable Uma função para ser chamada toda vez que se define valor
     * para o argumento. Opcional.
     */
    protected $validator = null;

    /**
     *
     * @var string|number|bool O valor do argumento.
     */
    protected $value = null;

    /**
     * Construtor.
     *
     * @param  string             $name          Nome do argumento.
     * @param  int                $requireValue Indica se um valor é requerido ou
     *                                           não.
     * @param  string|number|bool $defaultValue Valor padrão para o argumento.
     * @param  callable           $validator     Uma função validador para o valor
     *                                           do argumento.
     * @throws \InvalidArgumentException
     */
    public function __construct(
        string $name,
        int $requireValue = 0,
        $defaultValue = null,
        ?callable $validator = null
    ) {
        $this->name = $name;
        $this->requireValue = $requireValue;
        $this->validator = $validator;
        if ($this->set($defaultValue) === false) {
            throw new \InvalidArgumentException("default_value inválido: $defaultValue");
        }
    }

    /**
     * Retorna o valor do argumento.
     *
     * @return string|number|bool
     */
    public function get()
    {
        return $this->value;
    }

    /**
     * Define o valor do argumento.
     *
     * @param  string|number|bool $value
     * @return bool
     */
    public function set($value): bool
    {
        if (!is_null($this->validator)) {
            if ($this->validator($value) === false) {
                return false;
            }
        }

        $this->value = $value;
        return true;
    }

    /**
     * Retorna o nome da opção.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Retorna se a opção leva valor e se este é requerido ou opcional.
     *
     * @return int
     */
    public function requireValue(): int
    {
        return $this->requireValue;
    }
}
