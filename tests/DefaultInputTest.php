<?php

require_once '../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

/**
 * @covers CLIP\Input\DefaultInput
 */
final class DefaultInputTest extends TestCase
{
	public function testDefaultInputMustHaveResourceProperty(): void
	{
		$this->assertClassHasAttribute('resource', 'CLIP\Input\DefaultInput', 'CLIP\Input\DefaultInput must have $resource property');
	}

	/**
	 * @covers CLIP\Input\DefaultInput::getResource()
	 */
	public function testResourceMustBeAnResource(): void
	{
		$input = new CLIP\Input\DefaultInput();
		$this->assertInternalType('resource', $input->getResource());
	}
}
