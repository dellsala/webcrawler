<?php


require_once dirname(__DIR__).'/vendor/autoload.php';

$internetFile = $argv[1];


$internet = new \Webcrawler\Internet\Internet(json_decode(file_get_contents($internetFile)));

$crawler = new \Webcrawler\Webcrawler\Crawler();
$result = $crawler->crawl($internet);

print_r($result);