<?php
require __DIR__ . '/vendor/autoload.php';

use Cowsayphp\Farm;

header('Content-Type: text/plain');

$text = "Set a message by adding ?message=<message here> to the URL";
if(isset($_GET['message']) && $_GET['message'] != '') {
	$text = htmlspecialchars($_GET['message']);
}

if(isset($_GET['slow']) && $_GET['slow'] != '') {
	sleep(4);
	$text = "I'm a slow cow";
}

$text .= "\nCurrent time: " . date('Y-m-d H:i:s');
$cow = Farm::create(\Cowsayphp\Farm\Cow::class);
echo $cow->say($text);
