#!/usr/bin/php
<?php
require __DIR__ . '/../vendor/autoload.php';

$nome = CLIP\TUI\DataEntry::prompt('Digite seu nome:'.PHP_EOL);
echo 'Seu nome é ', $nome, PHP_EOL;

$menu = CLIP\TUI\DataEntry::menu(['s' => 'Sim', 'n' => 'Não'], 'Você é bonito?', 'Diga sua resposta [s/n]:');

switch ($menu){
    case 's':
        fwrite(STDOUT, "Então você acha que é bonito $nome?");
        break;
    case 'n':
        fwrite(STDOUT, "$nome, finalmente alguém sincero!");
        break;
    default:
        fwrite(STDOUT, "Tá difícil $nome?");
        break;
}