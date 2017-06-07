<?php

namespace Webcrawler\Internet;


class Internet {
	

	protected $pagesByAddress;
	
	
	public function __construct ($internetData)
	{
		foreach ($internetData->pages as $page) {
			$this->pagesByAddress[$page->address] = new Page($page->address, $page->links);
		}
	}
	
	
	/**
	 * @return Page
	 */
	public function getFirstPage ()
	{
		return array_values($this->pagesByAddress)[0];
	}
	
	
	/**
	 * @return Page
	 */
	public function requestPage ($address)
	{
		if (! isset($this->pagesByAddress[$address])) {
			return false;
		}
		return $this->pagesByAddress[$address];
	}

	
}