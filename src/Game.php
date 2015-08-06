<?php
class Game {
    private $word;
    private $guessesLeft;
    private $guessesMade;

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
        $this->guessesLeft = 6;
        $this->guessesMade = 0;
    }

    // setters
    function setWord ($new_word)
    {
        $this->word = (string) $new_word;
    }
    function setGuessesLeft ($new_left)
    {
        $this->guessesLeft = (int) $new_left;
    }
    function setGuessesMade ($new_made)
    {
        $this->guessesMade = (int) $new_made;
    }

    // getters
    function getWord()
    {
        return $this->word;
    }
    function getGuessesLeft()
    {
        return $this->guessesLeft;
    }
    function getGuessesMade()
    {
        return $this->guessesMade;
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
}
?>
