<?php

namespace Webcrawler\Internet;


class Page {
	
	public $address;
	public $linkList;
	
	public function __construct ($address, $linkList)
	{
		$this->address = $address;
		$this->linkList = $linkList;
	}
	
}
