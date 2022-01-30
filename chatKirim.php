<?php
require_once 'lib/Annisachat.php';

if (file_exists('file.txt')) {
	unlink('file.txt');
}

$chat = new Annisachat();

print($chat->color('red', '[+] Key : '));
$keyPair = trim(fgets(STDIN));

print($chat->color('green', '[+] Chat : '));
$chatInput = trim(fgets(STDIN));

$dataMentah = array(
	'id' => rand(1,999),
	'chat' => $chatInput
);

$result = $chat->encryptChat($keyPair, $dataMentah);

$chat->generateResult($result, 'file.txt');