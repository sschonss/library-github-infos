<?php

namespace Schons\GithubInfos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class GithubInfos
{
    private $client;
    private $crawler;
    protected $username;

    protected $user;

    public function __construct(ClientInterface $client, Crawler $crawler, User $user, $username)
    {
        $this->client = $client;
        $this->crawler = $crawler;
        $this->username = $username;
        $this->user = $user;

        $url = "https://github.com/" . $username;

        $response = $this->client->request('GET', $url);

        $html = $response->getBody();

        $this->crawler->addHtmlContent($html);
    }

    private function getUserName(GithubInfos $user_infos)
    {

        $value = $this->crawler->filter('.vcard-fullname')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        $user_infos->user->setName($value[0]);
    }

    private function getUserBiography(GithubInfos $user_infos)
    {

        $value = $this->crawler->filter('.user-profile-bio')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        $user_infos->user->setBiography($value[0]);
    }

    private function getUserNumberOfStars(GithubInfos $user_infos)
    {

        $value = $this->crawler->filter('.Counter')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        $user_infos->user->setNumberOfStars($value[3]);
    }

    public function setUserInfos(): void
    {
        $this->getUserName($this);
        $this->getUserBiography($this);
        $this->getUserNumberOfStars($this);
    }
}
