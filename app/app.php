<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Place.php";

    session_start();

    if (empty($_SESSION['places_list'])){
      $_SESSION['places_list'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app){
        $all_places = Place::getAll();
        return $app['twig']->render('index.html.twig', array('allplaces' => $all_places));
      });

    $app->post("/places", function() use ($app){
        $place = new Place($_POST['user_city']);
        $place->save();
        return $app['twig']->render('success.html.twig', array('new_city' => $place));
    });
    $app->post('/delete_place', function() use ($app){
      Place::deleteAll();
      return $app['twig']->render('delete_place.html.twig');
    });

    return $app;
?>
