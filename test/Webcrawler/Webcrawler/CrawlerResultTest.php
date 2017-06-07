<?php

namespace Webcrawler\Webcrawler;

class CrawlerResultTest extends \PHPUnit\Framework\TestCase {


	
	public function testRecordsErrorsOnlyOnce ()
	{
		$crawler = new CrawlerResult();
		$crawler->recordError('http://google.com/');
		$crawler->recordError('http://someothersite.com/');
		$crawler->recordError('http://google.com/');
		$this->assertEquals(
			['http://google.com/', 'http://someothersite.com/'],
			$crawler->error()
		);
	}
	
	
}