<?php

namespace Knez\Cirilator;

/**
 * Converts cyrilic to latin, haircuts latin, converts dj to đ
 */
class Cirilator {

	public static function giveLatinAHaircut($string) {
		return str_replace(
			CirilatorData::$serbianLatinLetters, CirilatorData::$haircutLatinLetters, $string);
	}
	
	public static function isCyrillic($sta) {
		return preg_match('/\p{Cyrillic}+/ui', $sta);
	}

	public static function convertCyrillicToLatin($cirlica) {
		return str_replace(CirilatorData::$cyrillicLetters, CirilatorData::$latinLetters, $cirlica);
	}

	/** Converts dj to đ, but leaves letters dj that are actually dj, e.g. "odjek". */
	public static function convertLettersDj($text) {
		$pieces = preg_split('/\b/ui', $text);
		$numPieces = count($pieces);
		$numDjWords = count(CirilatorData::$wordsWithDj);

		for($i=0; $i < $numPieces; $i++) {

			if(empty(trim($pieces[$i]))) continue;

			$wordToTest = mb_strtolower($pieces[$i]);

			for($j = 0; $j < $numDjWords; $j++) {
				if($wordToTest == CirilatorData::$wordsWithDj[$j]
					|| $wordToTest == self::giveLatinAHaircut(CirilatorData::$wordsWithDj[$j]))
					continue 2; // found special word; don't convert dj, check next word
			}

			$pieces[$i] = preg_replace("/dj/ui", "đ", $pieces[$i]);
		}

		return implode('', $pieces);
	}

	/**
	 * Replaces found "dj"-s with "đ"-s. If text is cyrillic, it is converted to latin.
	 * Useful for doing queries on a mysql database, if your data is in latin. Especially since
	 * mysql can wordk with haircut letters, but doesn't recognize "dj" as "đ"
	 *
	 * @param string $text
	 * @return string
	 */
	public static function srediSlova($text) {
		if(self::isCyrillic($text))
			$fixedText = self::convertCyrillicToLatin($text);
		else 
			$fixedText = self::convertLettersDj($text);
		
		return $fixedText;
	}
}
?>