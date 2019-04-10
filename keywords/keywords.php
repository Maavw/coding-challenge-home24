<?php

function filterStopWords($content) {

	$search = [
		'der', 'die', 'das', 'ein', 'eine', 'einer', 'und', 'aber', 'oder', 'in', 'an', 
		'von', 'zu', 'nicht', 'keine', 'mit', 'im', 'ist', 'für', 'auf', 'dem', 'auch',
		'hat', 'den', 'als', 'vor', 'will', 'einen', 'sind', 'es', 'bei', 'um', 'des',
		'sich', 'aus', 'wie'
	];

	$regexp = '/[[:<:]]' . implode($search, '[[:>:]]|[[:<:]]') . '[[:>:]]/iu';

	return preg_replace($regexp, '', $content);
}

$data = file_get_contents('https://www.golem.de/');

$stripJs = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $data);
$stripHtml = html_entity_decode(strip_tags($stripJs));

$stripSpecialChars = preg_replace('/[{}\._-]/', '', $stripHtml);
$stripStopwords = filterStopWords($stripSpecialChars);

$words = preg_split('/[\s,]+/', $stripStopwords);
$wordsData = array_count_values($words);
arsort($wordsData);

$top5 = array_slice($wordsData, 0, 5);

foreach ($top5 as $key => $value){
	echo $key . "	|	" . $value;
	echo "\t\n";
}










