<?php
require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

/**
 * @covers CLIP\Output\DefaultOutput
 */
final class DefaultOutputTest extends TestCase
{
	public function testDefaultOutputMustHaveResourceProperty(): void
	{
		$this->assertClassHasAttribute('resource', 'CLIP\Output\DefaultOutput', 'CLIP\Output\DefaultOutput must have $resource property');
	}

	/**
	 * @covers CLIP\Output\DefaultOutput::getResource()
	 */
	public function testResourceMustBeAnResource(): void
	{
		$output = new CLIP\Output\DefaultOutput();
		$this->assertInternalType('resource', $output->getResource());
	}

	/**
	 * @covers CLIP\Output\DefaultOutput::write()
	 */
	public function testWriteMustReturnOutputInterface(): void
	{
		$output = new CLIP\Output\DefaultOutput();
		$this->assertInstanceOf('CLIP\Output\DefaultOutput', $output->write(''));
	}

	/**
	 * @covers CLIP\Output\DefaultOutput::nl()
	 */
	public function testNlMustReturnOutputInterface(): void
	{
		$output = new CLIP\Output\DefaultOutput();
		$this->assertInstanceOf('CLIP\Output\DefaultOutput', $output->nl());
	}
}
