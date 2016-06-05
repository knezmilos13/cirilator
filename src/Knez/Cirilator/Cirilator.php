<?php

namespace Knez\Cirilator;

/**
 * Konvertuje cirilicu u latinicu, sisa latinicu, konvertuje dj u đ
 */
class Cirilator {

	public static function osisajLatinicu($string) {
		return str_replace(
			CirilatorData::$latinicaSrpska, CirilatorData::$latinicaOsisana, $string);
	}
	
	public static function jelCirilica($sta) {
		return preg_match('/\p{Cyrillic}+/ui', $sta);
	}
	
	public static function cirilicaULatinicu($cirlica) {
		return str_replace(CirilatorData::$cirilica, CirilatorData::$latinica, $cirlica);
	}

	/** Konvertuje dj u đ, ali tako da ostavlja ona dj koja su stvarno dj, kao tipa "odjek". */
	public static function konvertujDj($sta) {
		$parcad = preg_split('/\b/ui', $sta);
		$brojParcadi = count($parcad);
		for($i=0; $i < $brojParcadi; $i++) {
			if(!in_array($parcad[$i], CirilatorData::$reciSaDj))
				$parcad[$i] = preg_replace("/dj/ui", "đ", $parcad[$i]);
		}
		
		$sta = implode('', $parcad);
		return $sta;
	}

	/**
	 * Ako nadje "dj" u tekstu, menja ga pravim slovom dj (zamisli da sam ovo otkucao na srpskoj
	 * tastuturi). Takodje, ako je dati tekst na cirilici, menja ga u latinicu.
	 *
	 * @param string $izvorniTekst - izvorni tekst (cirilicni ili latinicni)
	 * @return string              - modifikovan tekst (latinicni)
	 */
	public static function srediSlova($izvorniTekst) {
		if(self::jelCirilica($izvorniTekst))
			$sredjenTekst = self::cirilicaULatinicu($izvorniTekst);
		else 
			$sredjenTekst = self::konvertujDj($izvorniTekst);
		
		return $sredjenTekst;
	}
}
?>