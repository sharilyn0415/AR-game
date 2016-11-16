<?php
//
//require('../vendor/autoload.php');
//
//$app = new Silex\Application();
//$app['debug'] = true;
//
//// Register the monolog logging service
//$app->register(new Silex\Provider\MonologServiceProvider(), array(
//  'monolog.logfile' => 'php://stderr',
//));
//
//// Register view rendering
//$app->register(new Silex\Provider\TwigServiceProvider(), array(
//    'twig.path' => __DIR__.'/views',
//));
//
//// Our web handlers
//
//$app->get('/', function() use($app) {
//  $app['monolog']->addDebug('logging output.');
//  return $app['twig']->render('index.twig');
//});
//
//$app->run();
include('header.php');

$longtitude = $_GET["longtitude"];
$latitude = $_GET["latitude"];

if ($longtitude == "" || $latitude == "") {
    echo "Missing longtitude and latitude";
    return;
}

echo $longtitude;
echo $latitude;

$sql = "SELECT * FROM locations";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br />";
        echo $row["longtitude"];
        echo "<br />";
        echo $row["latitude"];
    }
}

include('header.php');
