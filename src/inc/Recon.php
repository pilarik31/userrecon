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

    /**
     * Checks if HTTP response is not 3xx or 4xx.
     *
     * @param string $url URL to test.
     * @return boolean True if it's not, otherwise false.
     */
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

    /**
     * Sets username for testing.
     *
     * @param string $username Name of the user to test.
     * @return void
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * Gets count of check methods.
     *
     * @return int Count
     */
    public function getNumberOfServies()
    {
        return $this->numberOfServies;
    }

    /**
     * Gets current tested username.
     *
     * @return string Username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Checks if user exists on Instagram.
     *
     * @return bool
     */
    public function checkInstagram()
    {
        $url = "https://www.instagram.com/" . $this->username;
        return $this->isNot3xx4xx($url);
    }

    /**
     * Checks if user exists on GitHub.
     *
     * @return bool
     */
    public function checkGitHub()
    {
        $url = "https://github.com/" . $this->username;
        return $this->isNot3xx4xx($url);
    }

    /**
     * Checks if user exists on Twitter.
     *
     * @return bool
     */
    public function checkTwitter()
    {
        $url = "https://twitter.com/" . $this->username;
        return $this->isNot3xx4xx($url);
    }

    /**
     * Checks if user exists on Blogger.
     *
     * @return bool
     */
    public function checkBlogspot()
    {
        $url = "http://" . $this->username . ".blogspot.com/";
        return $this->isNot3xx4xx($url);
    }

    /**
     * Checks if user exists on Reddit.
     *
     * @return bool
     */
    public function checkReddit()
    {
        $url = "https://www.reddit.com/user/" . $this->username;
        return $this->isNot3xx4xx($url);
    }

    /**
     * Checks if user exists on Wordpress blog. CURRENTLY BROKEN!
     *
     * @return bool
     */
    public function checkWordpress()
    {
        $url = "https://" . $this->username . ".wordpress.com/";
        return $this->isNot3xx4xx($url);
    }
}
