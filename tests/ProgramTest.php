<?php
require_once __DIR__.'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

/**
 * @covers CLIP\Program
 */
final class ProgramTest extends TestCase
{
	public function testProgramMustHaveInputProperty(): void
	{
		$this->assertClassHasAttribute('input', 'CLIP\Program', 'Property $input not exist in CLIP\Program');
	}

	public function testProgramMustHaveOutputProperty(): void
	{
		$this->assertClassHasAttribute('output', 'CLIP\Program', 'Property $output not exist in CLIP\Program');
	}

	public function testProgramMustHaveErrorProperty(): void
	{
		$this->assertClassHasAttribute('error', 'CLIP\Program', 'Property $error not exist in CLIP\Program');
	}

}
