<?php


namespace Webcrawler\Webcrawler;


class CrawlerResult {
	
	protected $success = [];
	protected $skipped = [];
	protected $error = [];
	
	
	public function success ()
	{
		return $this->success;
	}
	
	
	public function skipped ()
	{
		return $this->skipped;
	}
	
	
	public function error ()
	{
		return $this->error;
	}
	
	
	public function hasBeenCrawled ($address)
	{
		return in_array($address, $this->success);
	}

	
	public function hasCrawlError ($address)
	{
		return in_array($address, $this->error);
	}	

	
	public function recordSuccess ($address)
	{
		$this->pushAddressIfNew('success', $address);
	}
	
	
	public function recordSkipped ($address)
	{
		$this->pushAddressIfNew('skipped', $address);
	}
	
	
	public function recordError ($address)
	{
		$this->pushAddressIfNew('error', $address);
	}
	
	
	protected function pushAddressIfNew ($list, $address)
	{
		if (in_array($address, $this->{$list})) {
			return;
		}
		return $this->{$list}[] = $address;
	}
	
	
	
}
