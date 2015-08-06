<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Game.php";
    require_once __DIR__."/../src/Guess.php";

    // initialize cookies
    session_start();
    // need to initialize specific cookies we want to use here

    $app = new Silex\Application();
    $app['debug'] = true;

    // enable twig
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    // hangman page

    // feedback page right or wrong

    // game over page

    return $app;

?>
