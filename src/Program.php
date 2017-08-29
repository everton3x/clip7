<?php
/**
 * Classe abstrata CLIP\Program file.
 *
 * @author  Everton da Rosa <everton3x@gmail.com>
 * @package CLIP
 * @since   1.0
 * @todo    Program::call() Chamar program com argumentos
 * @todo    Adicionar elementos UI básicos
 */
namespace CLIP;

use Exception;
use CLIP\Output\OutputInterface;
use CLIP\Input\InputInterface;
use CLIP\Error\ErrorInterface;
use CLIP\Program;

/**
 * Abstração para programas de linha de comando.
 *
 * Um programa é uma rotina para realizar tarefas.
 *
 * Para usar isto, você precisa criar uma instância da classe que extende CLIP\Program para fazer a mágica acontecer :)
 *
 * CLIP\Program::__construct() Prepara o ambiente e inicia o programa.
 * CLIP\Program::run(), Executa o programa.
 */
abstract class Program
{

    /**
     * Método abstrato para realizar todas as rotinas do programa.
     *
     * @return void
     */
    abstract protected function run(): void;

    /**
     *
     *
     * @var CLIP\InputInterface $input Um objeto input.
     */
    protected $input = null;

    /**
     *
     *
     * @var CLIP\Output\OutputInterface $output Um objeto output.
     */
    protected $output = null;

    /**
     *
     *
     * @var CLIP\Error\ErrorInterface $error Um objeto error.
     */
    protected $error = null;

    /**
     * Construtor da classe.
     *
     * O construtor prepara o ambiente e chama self::run().
     *
     * @param  CLIP\Input\InputInterface   $input  Objeto input.
     * @param  CLIP\Output\OutputInterface $output Objeto output.
     * @param  CLIP\Error\ErrorInterface   $error  Objeto error.
     * @throws \Exception
     */
    public function __construct(InputInterface $input, OutputInterface $output, ErrorInterface $error)
    {
        try {
            /* prepara o ambiente */
            $this->input = $input;
            $this->output = $output;
            $this->error = $error;

            /* executa o programa */
            $this->run();
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Alias para CLIP\Input\InputInterface::read().
     *
     * @see    CLIP\Input\InputInterface::read()
     * @return mixed
     */
    protected function read()
    {
        return $this->input->read();
    }

    /**
     * Alias para CLIP\Output\OutputInterface::write().
     *
     * @see    CLIP\Output\OutputInterface::write()
     * @param  string $data Dados para escrever no output.
     * @return CLIP\Output\OutputInterface
     */
    protected function write(string $data): OutputInterface
    {
        return $this->output->write($data);
    }

    /**
     * Atalho para CLIP\Output\OutputInterface::eol().
     *
     * @see    CLIP\Output\OutputInterface::eol()
     * @return CLIP\Output\OutputInterface
     */
    protected function eol(): OutputInterface
    {
        return $this->output->eol();
    }

    /**
     * Atalho para CLIP\Error\ErrorInterface::info().
     *
     * @see    CLIP\Error\ErrorInterface::info()
     * @param  string $data A mensagem.
     * @return CLIP\Error\ErrorInterface
     */
    protected function info(string $data): ErrorInterface
    {
        return $this->error->info($data);
    }

    /**
     * Atalho para CLIP\Error\ErrorInterface::alert().
     *
     * @see    CLIP\Error\ErrorInterface::alert()
     * @param  string $data O alerta.
     * @return CLIP\Error\ErrorInterface
     */
    protected function alert(string $data): ErrorInterface
    {
        return $this->error->alert($data);
    }

    /**
     * Atalho para CLIP\Error\ErrorInterface::error().
     *
     * @see    CLIP\Error\ErrorInterface::error()
     * @param  string $data O erro.
     * @return CLIP\Error\ErrorInterface
     */
    protected function error(string $data): ErrorInterface
    {
        return $this->error->error($data);
    }
}
