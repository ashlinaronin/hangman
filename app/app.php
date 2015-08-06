<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Game.php";
    require_once __DIR__."/../src/Guess.php";

    // initialize cookies, create new Game object
    session_start();
    if (empty($_SESSION['current_game'])) {
        $_SESSION['current_game'] = new Game();
    }


    $app = new Silex\Application();
    $app['debug'] = true;

    // enable twig
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    // pass twig the current game so it can display it
    $app->get('/hangman', function() use($app){
        return $app['twig']->render('hangman.html.twig', array('current_game', Game::getCurrentGame()));
    });

    $app->post('/feedback', function() use($app) {
        $new_guess = new Guess($_POST['guess']);
        $current_game = Game::getCurrentGame();
        $current_game->addGuess($new_guess);

        // the feedback twig page only needs data from the current guess, not the whole game
        return $app['twig']->render('feedback.html.twig', array('new_guess' => $new_guess));
    });
    // feedback page right or wrong

    // game over page

    return $app;

?>
