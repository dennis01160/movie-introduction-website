<?php
require_once 'vendor/autoload.php';

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\SymfonyCache;
use BotMan\BotMan\Drivers\DriverManager;

require_once('OnboardingConversation.php');

$config = [];

DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

$adapter = new FilesystemAdapter();

$botman = BotManFactory::create($config, new SymfonyCache($adapter));


$botman->hears('Hello', function($bot) {
    
    $bot->startConversation(new OnboardingConversation);
    
});

$botman->hears('1', function($bot) {
	include"config.php";
	
    $sql = "SELECT MAX(score) FROM movie";
	mysqli_query($con, 'SET NAMES utf8'); 
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$max = $row[0];
	$sql2 = "SELECT * from movie WHERE score='".$max."' AND type=1";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
		$bot->reply($row2['name']);
    
});

$botman->hears('2', function($bot) {
	include"config.php";
	
    $sql = "SELECT MAX(score) FROM movie";
	mysqli_query($con, 'SET NAMES utf8'); 
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$max = $row[0];
	$sql2 = "SELECT * from movie WHERE score='".$max."' AND type=2";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
		$bot->reply($row2['name']);
    
});

$botman->hears('3', function($bot) {
	include"config.php";
	
    $sql = "SELECT MAX(score) FROM movie";
	mysqli_query($con, 'SET NAMES utf8'); 
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$max = $row[0];
	$sql2 = "SELECT * from movie WHERE score='".$max."' AND type=3";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
		$bot->reply($row2['name']);
    
});

$botman->hears('4', function($bot) {
	include"config.php";
	
    $sql = "SELECT MAX(score) FROM movie";
	mysqli_query($con, 'SET NAMES utf8'); 
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$max = $row[0];
	$sql2 = "SELECT * from movie WHERE score='".$max."' AND type=4";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
		$bot->reply($row2['name']);
    
});

$botman->hears('5', function($bot) {
	include"config.php";
	
    $sql = "SELECT MAX(score) FROM movie";
	mysqli_query($con, 'SET NAMES utf8'); 
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$max = $row[0];
	$sql2 = "SELECT * from movie WHERE score='".$max."' AND type=5";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
		$bot->reply($row2['name']);
    
});

$botman->hears('6', function($bot) {
	include"config.php";
	
    $sql = "SELECT MAX(score) FROM movie";
	mysqli_query($con, 'SET NAMES utf8'); 
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$max = $row[0];
	$sql2 = "SELECT * from movie WHERE score='".$max."' AND type=6";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
		$bot->reply($row2['name']);
    
});

$botman->hears('7', function($bot) {
	include"config.php";
	
    $sql = "SELECT MAX(score) FROM movie";
	mysqli_query($con, 'SET NAMES utf8'); 
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$max = $row[0];
	$sql2 = "SELECT * from movie WHERE score='".$max."' AND type=7";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
		$bot->reply($row2['name']);
    
});

$botman->hears('8', function($bot) {
	include"config.php";
	
    $sql = "SELECT MAX(score) FROM movie";
	mysqli_query($con, 'SET NAMES utf8'); 
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$max = $row[0];
	$sql2 = "SELECT * from movie WHERE score='".$max."' AND type=8";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
		$bot->reply($row2['name']);
    
});

$botman->hears('9', function($bot) {
	include"config.php";
	
    $sql = "SELECT MAX(score) FROM movie";
	mysqli_query($con, 'SET NAMES utf8'); 
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$max = $row[0];
	$sql2 = "SELECT * from movie WHERE score='".$max."' AND type=9";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
		$bot->reply($row2['name']);
    
});

$botman->hears('10', function($bot) {
	include"config.php";
	
    $sql = "SELECT MAX(score) FROM movie";
	mysqli_query($con, 'SET NAMES utf8'); 
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$max = $row[0];
	$sql2 = "SELECT * from movie WHERE score='".$max."' AND type=10";
	$result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
		$bot->reply($row2['name']);
    
});

$botman->listen();