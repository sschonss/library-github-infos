<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;
use Schons\GithubInfos\GithubInfos;
use Schons\GithubInfos\User;

class TestGithubInfos extends TestCase
{

    public function testGetGithubInfos()
    {
        $crawler = new Crawler();
        $user = new User('sschonss');
        $githubInfos = new GithubInfos(new Client(), $crawler, $user, 'sschonss');
        $githubInfos->setUserInfos();
        $data = $user->getJsonDataUser();
        $this->assertEquals('{"username":"sschonss","name":"schons","biography":"Data Analyst and Back-End Developer","number_of_stars":"40"}', $data);
    }

}