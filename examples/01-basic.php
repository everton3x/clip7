#!/usr/bin/php
<?php

require '../vendor/autoload.php';

class MyProgram extends CLIP\Program
{
	public function __construct()
	{
		parent::__construct(
			new CLIP\Input\DefaultInput(),
			new CLIP\Output\DefaultOutput(),
			new CLIP\Error\DefaultError()
		);
	}

	protected function run(): void
	{
		$this->write('Hello world CLIP!')->nl();

		$this->write('Please, say your name: ')->nl();
		$username = $this->read();
		$this->write("Thank you $username!")->nl();

		$this->info("Hey $username! It is an information message.");
		$this->nl();
		$this->alert("Ops! It is an alert message.");
		$this->nl();
		$this->error("Oh my god! An error occurred!");
		$this->nl();
		$this->write('Bye!')->nl();

	}
}

$pgm1 = new MyProgram();
