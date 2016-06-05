<?php

namespace Knez\Test\Util;
use Knez\Cirilator\Cirilator;

class CirilatorTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider providerZaJelCirilica
	 */
	public function testJelCirilica($tekst, $jelCirilica) {
		$this->assertEquals($jelCirilica, Cirilator::isCyrillic($tekst));
	}
	
	public function providerZaJelCirilica() {
		return [
			[ "abcdefg", false ],
			[ "abcčćdđ", false ],
			[ "abшčćdđ", true ],
			[ "абвгдђе", true ],
			[ "ёёёёёёё", true ], // ruska cirilica
			[ "ひらがな", false ],
			[ "平仮名", false ]
		];
	}
	
	
	/**
	 * @dataProvider providerZaCirilicaULatinicu
	 */
	public function testCirilicaULatinicu($tekst, $rezultat) {
		$this->assertEquals($rezultat, Cirilator::convertCyrillicToLatin($tekst));
	}
	
	public function providerZaCirilicaULatinicu() {
		return [
			[ "abcdefg", "abcdefg" ],
			[ "čćđš", "čćđš" ],
			[ "abcшђњ", "abcšđnj" ],
			[ "абвгдђе", "abvgdđe" ],
			[ "ёёёёёёё", "ёёёёёёё" ], // ruska cirilica
			[ "ひらがな", "ひらがな" ],
			[ "平仮名", "平仮名" ]
		];
	}
	
	
	/**
	 * @dataProvider providerZaKonvertujDj
	 */
	public function testKonvertujDj($tekst, $rezultat) {
		$this->assertEquals($rezultat, Cirilator::convertLettersDj($tekst));
	}
	
	public function providerZaKonvertujDj() {
		return [
			[ "abcdjef", "abcđef" ], // dj postaje đ

			[ "odjek", "odjek" ], // ovo mora da ostane dj
			[ "Odjek", "Odjek" ],

			[ "DJ", "DJ" ], // ovo ostaje DJ (doduse case insensitive, ostace i dj)

			[ "bla pedja bla odjek bla odjek dodji podjednako nanana",
				"bla peđa bla odjek bla odjek dođi podjednako nanana" ],

			[ "bla, ;pedja, ,bla ,odjek, , , ,bla ,odjek ,dodji !podjednako??? !!!nanana",
				"bla, ;peđa, ,bla ,odjek, , , ,bla ,odjek ,dođi !podjednako??? !!!nanana" ],

			[ "ёёёёёёё", "ёёёёёёё" ], // ruska cirilica
			[ "ひらがな", "ひらがな" ],
			[ "平仮名", "平仮名" ],

			[ 'nadjačavši', 'nadjačavši' ],
			[ 'nadjacavsi', 'nadjacavsi' ]
		];
	}


	/**
	 * @dataProvider providerZaOsisajLatinicu
	 */
	public function testOsisajLatinicu($tekst, $rezultat) {
		$this->assertEquals($rezultat, Cirilator::giveLatinAHaircut($tekst));
	}

	public function providerZaOsisajLatinicu() {
		return [
			[ 'abcdefghijklmnopqrstuvwzxyz', 'abcdefghijklmnopqrstuvwzxyz'],
			[ 'ČŠĆĐDžŽ', 'CSCDjDzZ' ],
			[ 'čšćđdžž', 'cscdjdzz' ]
		];
	}
}
?>