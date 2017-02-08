<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Campsite.php";

    session_start();

    if (empty($_SESSION['list_of_campsites'])) {
        $_SESSION['list_of_campsites'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {

        return $app['twig']->render('campsite.html.twig', array('campsites' => Campsite::getAll()));
    });

    $app->post("/campsite", function() use ($app) {
        $campsite = new Campsite($_POST['title']);
        $campsite->save();
        return $app['twig']->render('create_campsite.html.twig');
    });

    $app->post("/delete_campsite", function() use ($app){

        Campsite::deleteAll();

        return $app['twig']->render('delete_campsite.html.twig');
    });

    return $app;
?>
