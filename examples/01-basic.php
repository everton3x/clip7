#!/usr/bin/php
<?php
require __DIR__ . '/../vendor/autoload.php';

class HelloWorld extends \CLIP\Program
{

    public function __construct()
    {
        parent::__construct(new \CLIP\Input\DefaultInput(), new \CLIP\Output\DefaultOutput(), new \CLIP\Error\DefaultError(), new \CLIP\Input\Option('n'), new \CLIP\Input\Option('r', 1), new \CLIP\Input\Option('o', 2, 'valor padrão'));
    }

    protected function run(): void
    {
        $this->write('Hello world by CLIP7!')->eol();
        $this->write('As opções fornecidas na chamada ao programa são:')->eol();
        foreach ($this->options as $option) {
            $this->write("{$option->name()} -> {$option->get()} (" . gettype($option->get()) . ')')->eol();
        }
    }
}

$prg = new HelloWorld();
