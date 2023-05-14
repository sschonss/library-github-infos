<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

use Schons\GithubInfos\GithubInfos;
use Schons\GithubInfos\User;

$client = new Client();
$crawler = new Crawler();

$username_requested = 'sschonss';

$user = new User($username_requested);

$github_infos = new GithubInfos($client, $crawler, $user, $username_requested);

$github_infos->setUserInfos();

$data = $user->getJsonDataUser();

echo $data;



