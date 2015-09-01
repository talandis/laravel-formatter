<?php namespace DanielFurmanov\Formatter\Test\Parsers;

use DanielFurmanov\Formatter\Test\TestCase;
use DanielFurmanov\Formatter\Parsers\Parser;
use DanielFurmanov\Formatter\Parsers\YamlParser;
use DanielFurmanov\Formatter\Parsers\XmlParser;

class YamlParserTest extends TestCase {

	public function testYamlParserIsInstanceOfParserInterface() {
		$parser = new YamlParser('');
		$this->assertTrue($parser instanceof Parser);
	}

	public function testtoArrayReturnsArrayRepresenationOfYamlObject() {
		$expected = ['foo' => 'bar'];
		$parser = new XmlParser('<xml><foo>bar</foo></xml>');
		$x = new YamlParser($parser->toYaml());
		$this->assertEquals($expected, $x->toArray());
	}

}
