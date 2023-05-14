<?php

namespace Schons\GithubInfos;

class User
{
    protected $username;

    protected $name;

    protected $biography;

    protected $number_of_repositories;

    protected $number_of_followers;

    protected $number_of_following;

    protected $number_of_stars;


    public function __construct($username)
    {
        $this->username = $username;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function setBiography($biography)
    {
        $this->biography = $biography;
    }


    public function setNumberOfStars($number_of_stars)
    {
        $this->number_of_stars = $number_of_stars;
    }

    public function getJsonDataUser()
    {
        return json_encode([
            'username' => $this->username,
            'name' => $this->name,
            'biography' => $this->biography,
            'number_of_stars' => $this->number_of_stars
        ]);
    }
}
