<?php 

class ServerName
{	
	public $adjectives = ['fluffy','difficult','murky','wonky','superb','flippant', 'splendid','tasteless','tacky','crusty','shady'];

	public $nouns = ['wormhole','spaceship','dachshund','pizza','robot','sloth','blanket','jugglers','bucket','puzzle','tricycle'];


	public function randomElement($array)
	{
		$random = mt_rand(0,10);
		$element = $array[$random];
		return $element;
	}

	public function newServer()
	{
		$serverName = $this->randomElement($this->adjectives) . "-" . $this->randomElement($this->nouns);
		return $serverName; 
	}


}
