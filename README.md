# cirilator
Serbian cyrillic to latin convertor with some additional utilities

Note: I'm aware of the irony of library called Cirilator (cyrilizer) not actually doing latin to cyrillic conversion, only the other way around.

Install cirilator by adding to your composer.json file:

    "require": {
      ...
      "knezmilos13/cirilator": "dev-master"
      ...
	}
	
	
All functions are defined as static on class Cirilator, e.g.:

    $haircutLatin = Cirilator::giveLatinAHaircut($text);


Available functions:

| Name                   | Description                                                        |
|------------------------|--------------------------------------------------------------------|
| giveLatinAHaircut      | Converts Serbian latin letters - č, š, ć, etc. into c, s, c...     |
| isCyrillic             | Returns TRUE if text is any kind of cyrilic                        |
| convertCyrillicToLatin | Converts Serbian cyrillic to latin                                 |
| convertLettersDj       | Converts "dj"-s into "đ"-s, taking special cases into account      |
| fixLettersForDB        | If cyrillic, converts to latin; if latin, converts "dj"-s to "đ"-s |
