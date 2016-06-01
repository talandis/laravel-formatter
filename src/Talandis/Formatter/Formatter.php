<?php namespace Talandis\Formatter;

use InvalidArgumentException;
use Talandis\Formatter\Parsers\ArrayParser;
use Talandis\Formatter\Parsers\CsvParser;
use Talandis\Formatter\Parsers\JsonParser;
use Talandis\Formatter\Parsers\XmlParser;
use Talandis\Formatter\Parsers\YamlParser;

class Formatter {
	/**
	 * Add class constants that help define input format
	 */
	const CSV  = 'csv';
	const JSON = 'json';
	const XML  = 'xml';
	const ARR  = 'array';
	const YAML = 'yaml';

	private static $supportedTypes = [self::CSV, self::JSON, self::XML, self::ARR, self::YAML];
	private $parser;

	/**
	 * Make: Returns an instance of formatter initialized with data and type
	 *
	 * @param mixed $data The data that formatter should parse
	 * @param string $type The type of data formatter is expected to parse
	 *
	 * @return Formatter
	 */
	public static function make($data, $type) {
		if (in_array($type, self::$supportedTypes)) {
			$parser = null;
			switch ($type) {
				case self::CSV:
					$parser = new CsvParser($data);
					break;
				case self::JSON:
					$parser = new JsonParser($data);
					break;
				case self::XML:
					$parser = new XmlParser($data);
					break;
				case self::ARR:
					$parser = new ArrayParser($data);
					break;
				case self::YAML:
					$parser = new YamlParser($data);
					break;
			}
			return new Formatter($parser, $type);
		}
		throw new InvalidArgumentException(
			'make function only accepts [csv, json, xml, array] for $type but ' . $type . ' was provided.'
		);
	}

	private function __construct($parser) {
		$this->parser = $parser;
	}

	public function toJson() {
		return $this->parser->toJson();
	}

	public function toArray() {
		return $this->parser->toArray();
	}

	public function toYaml() {
		return $this->parser->toYaml();
	}

	public function toXml($baseNode = 'xml', $encoding = 'utf-8') {
		return $this->parser->toXml($baseNode, $encoding);
	}

	public function toCsv( $newline = "\n", $delimiter = ",", $enclosure = '"', $escape = "\\" ) {
		return $this->parser->toCsv( $newline, $delimiter, $enclosure, $escape );
	}
}
