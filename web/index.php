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
include('mylib.php');

$longitude = $_GET["longitude"];
$latitude = $_GET["latitude"];

if ($longitude == "" || $latitude == "") {
    echo "Missing longitude and latitude";
    return;
}

$sql = "SELECT * FROM locations";
$res = [];
$res['status'] = '0';
$res['url'] = '';
$res['type'] = '';

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if (distance(floatval($latitude), floatval($longitude), floatval($row["latitude"]), floatval($row["longitude"]), 'M') < 0.01) {
            $res['status'] = '1';
            $res['url'] = $row["url"];
            $res['type'] = $row["type"]
            break;
        } elseif (distance(floatval($latitude), floatval($longitude), floatval($row["latitude"]), floatval($row["longitude"]), 'M') < 0.1) {
            $res['status'] = '2';
            $res['type'] = $row["type"]
            break;
        }
    }
}

echo json_encode($res);

include('header.php');
