<?php
require_once './vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
/**
 * Annisa Chatting
 */
class Annisachat {
	
	public function __construct(){
		# code...
	}

	public function encryptChat($privateKeys, $data = array()){
		$result = JWT::encode($data, $privateKeys, 'HS256');

		return $result;
	}

	public function decryptChat($publicKeys, $data){
		$result = JWT::decode($data, new Key($publicKeys, 'HS256'));

		return $result;
	}

	public function chatRandom(){
		$chat = array(
			'Halo selamat pagi!',
			'Halo selamat siang!',
			'Halo selamat malam!',
		);

		$indexRandom = array_rand($chat);

		return $chat[$indexRandom];
	}

	public function generateResult($jwt, $nameFile){
        $file = fopen($nameFile, "a", 1);

        fwrite($file, $jwt);
        fclose($file);
    }

	public function color($color, $text) {
        $arrayColor = array(
            'grey'      => '1;30',
            'red'       => '1;31',
            'green'     => '1;32',
            'yellow'    => '1;33',
            'blue'      => '1;34',
            'purple'    => '1;35',
            'nevy'      => '1;36',
            'white'     => '1;0',
        );

        return "\033[".$arrayColor[$color]."m".$text."\033[0m";
    }
}