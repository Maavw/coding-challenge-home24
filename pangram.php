<?php

$alphabet = [
	'a','b','c','d','e','f','g','h','i','j','k','l','m',
	'n','o','p','q','r','s','t','u','v','w','x','y','z'
];

$input = readline();
$split = str_split(strtolower($input));
$difference = array_diff($alphabet, $split);

if (empty($difference)) {
	echo "Your given sentence is a pangram.";
}
else {
	echo "Your given sentence is not a pangram."; 
	echo "\t\n";
	echo "Missing letters: " . implode(", ", $difference);
} 

echo PHP_EOL;
