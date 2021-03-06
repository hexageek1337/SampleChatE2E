<?php
require_once 'lib/Annisachat.php';

$chat = new Annisachat();

print($chat->color('red', '[+] Key : '));
$keyPair = trim(fgets(STDIN));

$data = file_get_contents('file.txt');

try {
	$resultDecrypt = $chat->decryptChat($keyPair, $data);

	print($chat->color('green', '[+] Chat : '.$resultDecrypt->chat));
	$chat->generateResult($resultDecrypt->chat, 'chat.txt');
} catch (Exception $e) {
	print($chat->color('green', '[+] Chat : '.$data));
	$chat->generateResult($data, 'chat.txt');
}