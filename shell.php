#!/usr/bin/env php
<?php
if (PHP_SAPI !== 'cli') {
    die("PHP not running in CLI! This script must be ran from terminal!");
} else {
    echo "PHP running in terminal, proceeding..." . PHP_EOL;
}

require_once "vendor/autoload.php";
use PilaLib\Recon;

$consoleColor = new JakubOnderka\PhpConsoleColor\ConsoleColor();
$recon = new Recon();

$recon->setUsername(readline('[?] Username: '));
$username = $recon->getUsername();

echo $recon->checkInstagram() ?
$consoleColor->apply('color_2', "[+] ") . "https://www.instagram.com/{$username} ... Found!" :
$consoleColor->apply('color_1', "[-] ") . "https://www.instagram.com/{$username} ... Not found.";

echo PHP_EOL;

echo $recon->checkGitHub() ?
$consoleColor->apply('color_2', "[+] ") . "https://github.com/{$username} ... Found!" :
$consoleColor->apply('color_1', "[-] ") . "https://github.com/{$username} ... Not found.";

echo PHP_EOL;

echo $recon->checkTwitter() ?
$consoleColor->apply('color_2', "[+] ") . "https://twitter.com/{$username} ... Found!" :
$consoleColor->apply('color_1', "[-] ") . "https://twitter.com/{$username} ... Not found.";

echo PHP_EOL;

echo $recon->checkBlogspot() ?
$consoleColor->apply('color_2', "[+] ") . "http://" . $username . ".blogspot.com/ ... Found!" :
$consoleColor->apply('color_1', "[-] ") . "http://" . $username . ".blogspot.com/ ... Not found.";

echo PHP_EOL;

echo $recon->checkReddit() ?
$consoleColor->apply('color_2', "[+] ") . "https://www.reddit.com/user/{$username} ... Found!" :
$consoleColor->apply('color_1', "[-] ") . "https://www.reddit.com/user/{$username} ... Not found.";

echo PHP_EOL;

echo $recon->checkWordpress() ?
$consoleColor->apply('color_2', "[+] ") . "http://" . $username . ".wordpress.com/ ... Found!" :
$consoleColor->apply('color_1', "[-] ") . "http://" . $username . ".wordpress.com/ ... Not found.";

echo PHP_EOL;

echo PHP_EOL;
