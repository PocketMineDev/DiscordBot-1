<?php

//include "commands.php";

$token = "";

$bot = new Bot($token);
$bot->connect();

class Bot {
	
	public $token;
	public $api;
	public $socket;

	function __construct($token) {
		$this->token = $token;
	}
	
	function connect() {
		Bot::getGateway();
		$this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		socket_connect($this->socket, "gateway.discord.gg", 80) or die("No connection");
		Bot::SocketRead();
	}
	
	function getGateway() {
		$gateway = json_decode(file_get_contents("https://discordapp.com/api/gateway"));
		$this->api = $gateway->url;
	}
	
	function SocketRead() {
		while ($data == socket_read($this->socket, 2048, PHP_NORMAL_READ)) {
			Bot::SocketInterpret($data);
		}
	}
	
	function SocketInterpret($data) {
		echo $data;
	}
	
}

?>
