<?php

namespace Webcrawler\Webcrawler;

use Webcrawler\Internet\Internet;


class Crawler {
	
	
	/**
	 * @return CrawlerResult
	 */
	public function crawl (Internet $internet)
	{
		$addressListToCrawl = [$internet->getFirstPage()->address];
		$crawlResult = new CrawlerResult();
		while (count($addressListToCrawl)) {
			$nextAddress = array_pop($addressListToCrawl);
			if ($crawlResult->hasBeenCrawled($nextAddress)) {
				$crawlResult->recordSkipped($nextAddress);
				continue;
			}
			if ($crawlResult->hasCrawlError($nextAddress)) {
				// Already recorded an error. Do nothing.
				continue;
			}
			$crawledPage = $internet->requestPage($nextAddress);
			if (! $crawledPage) {
				$crawlResult->recordError($nextAddress);
				continue;
			}
			foreach ($crawledPage->linkList as $linkAddress) {
				array_unshift($addressListToCrawl, $linkAddress);
			}
			$crawlResult->recordSuccess($crawledPage->address);
		}
		return $crawlResult;
	}
	
	
}
