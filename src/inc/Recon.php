<?php
namespace PilaLib;

class Recon
{
    private $username;
    public $instagram;
    private $numberOfServies = 1;
    
    public function __construct()
    {
    }

    public function isNot3xx4xx($url)
    {
        $ch = curl_init();

        $options = array(
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_AUTOREFERER    => true,
            CURLOPT_CONNECTTIMEOUT => 120,
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
        );
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        /* If the document has loaded successfully without any redirection or error */
        if ($httpCode >= 200 && $httpCode < 300) {
            return true;
        } else {
            return false;
        }
        curl_close($ch);
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getNumberOfServies()
    {
        return $this->numberOfServies;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function checkInstagram()
    {
        //$response = file_get_contents("https://www.instagram.com/" . $this->username . "/");
        $url = "https://www.instagram.com/" . $this->username;
        return $this->isNot3xx4xx($url);
    }

    public function checkGitHub()
    {
        $url = "https://github.com/" . $this->username;
        return $this->isNot3xx4xx($url);
    }

    public function checkTwitter()
    {
        $url = "https://twitter.com/" . $this->username;
        return $this->isNot3xx4xx($url);
    }

    public function checkBlogspot()
    {
        $url = "http://" . $this->username . ".blogspot.com/";
        return $this->isNot3xx4xx($url);
    }

    public function checkReddit()
    {
        $url = "https://www.reddit.com/user/" . $this->username;
        return $this->isNot3xx4xx($url);
    }

    public function checkWordpress()
    {
        $url = "https://" . $this->username . ".wordpress.com/";
        return $this->isNot3xx4xx($url);
    }
}
