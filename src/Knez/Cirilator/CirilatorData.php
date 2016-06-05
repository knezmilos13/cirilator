<?php

namespace Knez\Cirilator;

/** Sadrzi konstante - nizove sa slovima, recima i sl. */
class CirilatorData {
	
	static $cirilica = [ "љ", "њ", "е", "р", "т", "з", "у", "и", "о",
		"п", "ш", "ђ", "ж", "а", "с", "д", "ф", "г", "х", "ј", "к", "л", 
		"ч", "ћ", "џ", "ц", "в", "б", "н", "м", "Љ", "Њ", "Е", "Р", "Т", 
		"З", "У", "И", "О", "П", "Ш", "Ђ", "Ж", "А", "С", "Д", "Ф", "Г", 
		"Х", "Ј", "К", "Л", "Ч", "Ћ", "Џ", "Ц", "В", "Б", "Н", "М" ];
	static $latinica = [ "lj", "nj", "e", "r", "t", "z", "u", "i", "o",
		"p", "š", "đ", "ž", "a", "s", "d", "f", "g", "h", "j", "k", "l", 
		"č", "ć", "dž", "c", "v", "b", "n", "m", "Lj", "Nj", "E", "R", "T", 
		"Z", "U", "I", "O", "P", "Š", "Đ", "Ž", "A", "S", "D", "F", "G", 
		"H", "J", "K", "L", "Č", "Đ", "Dž", "C", "V", "B", "N", "M" ];

	// Napomena: neki izgleda imaju nesrpske tastarure sa nekim cudnim latinicnim slovima kao ż
	static $latinicaSrpska =
		[ 'š', 'č', 'ć', 'đ',  'ž', 'Š', 'Č', 'Ć', 'Đ',  'Dž', 'Ž', 'ż', 'Ż' ];
	static $latinicaOsisana =
		[ 's', 'c', 'c', 'dj', 'z', 'S', 'C', 'C', 'Dj', 'Dz', 'Z', 'z', 'Z' ];
		
	static $reciSaDj = [
		/* A */
		"adjektiv", "adjektiva", "adjektivi", "adjektivom", "adjektivu",

		/* B */
		"bdjenja",

		/* D */
		"DJ", // doduse ovo je case insensitive, znaci svako samostalno dj ce ostati dj

		/* I */
		"izblijedjeli", "izblijedjelo",

		/* N */
		"nadjača", "nadjačava", "nadjačavajući", "nadjačavao", "nadjačavši", "nadjačaju",
		"nadjačala", "nadjačale", "nadjačali", "nadjačam", "nadjačan", "nadjačane", "nadjačani",
		"nadjačano", "nadjačao", "nadjačati", "nadjačaće", "nadjačah", "nadjačaše", "nadjunači",
		"nadjunačimo", "nadjunačismo", "nenadjačan",

		/* O */
		"odjava", "odjave", "odjavi", "odjavili", "odjavilo", "odjavio", "odjavite",
		"odjaviti", "odjaviše", "odjavljen", "odjavljena", "odjavljeni", "odjavljivanje",
		"odjavljivati", "odjavljujem", "odjavljuju", "odjavna", "odjavni", "odjavnim", "odjavu",
		"odjaha", "odjahali", "odjahao", "odjahati", "odjahaše", "odjaše", "odjašem", "odjaši",
		"odjašu", "odjebeš", "odjebi", "odjedanput", "odjedared", "odjednom", "odjedriti", "odjek",
		"odjeka", "odjeke", "odjekivala", "odjekivale", "odjekivali", "odjekivalo", "odjekivanje",
		"odjekivao", "odjekivati", "odjekivahu", "odjekivaše", "odjekne", "odjekni", "odjeknu",
		"odjeknula", "odjeknule", "odjeknuli", "odjeknulo", "odjeknuo", "odjeknuti", "odjeknuće",
		"odjeknuše", "odjekom", "odjeku", "odjekuje", "odjekujem", "odjekuju", "odjekujući",
		"odjela", "odjelo", "odjesti", "odjeci", "odjecima", "odjure", "odjuri", "odjurila",
		"odjurili", "odjurim", "odjurio", "odjurite", "odjuriti", "odjuriše",

		/* P */
		"podjari", "podjarivao", "podjariti", "podjarme", "podjarmi", "podjarmila",
		"podjarmili", "podjarmio", "podjarmiti", "podjarmiše", "podjarmljen", "podjarmljeni",
		"podjarmljenosti", "podjarmljivati", "podjarujem", "podjednak", "podjednaka", "podjednake",
		"podjednaki", "podjednakim", "podjednakih", "podjednako", "podjednakoj", "podjednaku",
		"podjezična", "podjela", "podjele", "predjela", "predjelima", "predjelo", "predjelom",
		"predjelu",

		/* R */
		"razdjeliti", "razdjeliše",

		/* V */
		"vindjaknom", "vindjaknu",

		/* Z */
		"zapodjene", "zdjela", "zdjele",
	];

}
?>