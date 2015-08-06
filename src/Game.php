<?php
class Game {
    private $word;
    private $guesses_left;
    private $guesses_made;
    private $all_guesses;

    function __construct()
    {
        $wordOptions = array(
            "chicken",
            "robot",
            "filth",
            "doll",
            "spinlister");

        // choose random word
        $this->word = $wordOptions[array_rand($wordOptions)];
        $this->guesses_left = 6;
        $this->guesses_made = 0;

        // a new game starts out with no guesses
        $this->all_guesses = array();
    }

    // setters
    function setWord ($new_word)
    {
        $this->word = (string) $new_word;
    }
    function setGuessesLeft ($new_left)
    {
        $this->guesses_left = (int) $new_left;
    }
    function setGuessesMade ($new_made)
    {
        $this->guesses_made = (int) $new_made;
    }

    // getters
    function getWord()
    {
        return $this->word;
    }
    function getGuessesLeft()
    {
        return $this->guesses_left;
    }
    function getGuessesMade()
    {
        return $this->guesses_made;
    }

    //save function to store current game in cookies
    function save()
    {
        $_SESSION['current_game'] = $this;
    }
    // reset game status to a new game
    function restart()
    {
        $_SESSION['current_game'] = new Game();
    }

    // adding a new guess means adding a new Guess object to the all_guesses array
    function addGuess($new_guess)
    {
        array_push($this->all_guesses, $new_guess);
    }

    static function getCurrentGame()
    {
        return $_SESSION['current_game'];
    }
}
?>
