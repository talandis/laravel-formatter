<?php namespace Talandis\Formatter\Test\Parsers;

use Talandis\Formatter\Test\TestCase;
use Talandis\Formatter\Parsers\Parser;
use Talandis\Formatter\Parsers\XmlParser;

class XmlParserTest extends TestCase {

	public function testXmlParserIsInstanceOfParserInterface() {
		$parser = new XmlParser('');
		$this->assertTrue($parser instanceof Parser);
	}

	public function testtoArrayReturnsArrayRepresenationOfXmlObject() {
		$expected = ['foo' => 'bar'];
		$parser = new XmlParser('<xml><foo>bar</foo></xml>');
		$this->assertEquals($expected, $parser->toArray());
	}

	public function testtoJsonReturnsJsonRepresentationOfXmlObject() {
		$expected = '{"foo":"bar"}';
		$parser = new XmlParser('<xml><foo>bar</foo></xml>');
		$this->assertEquals($expected, $parser->toJson());
	}
}
