<?php namespace Talandis\Formatter\Test\Parsers;

use Talandis\Formatter\Test\TestCase;
use Talandis\Formatter\Parsers\Parser;
use Talandis\Formatter\Parsers\YamlParser;
use Talandis\Formatter\Parsers\XmlParser;

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
