<?php
class Game {
    private $word; //array
    private $guesses_left;
    private $guesses_made;
    private $all_guesses;
    private $guessed_indices;

    function __construct()
    {
        $word_options = array(
            "chicken",
            "robot",
            "filth",
            "doll",
            "spinlister");

        // choose random word, make it into an array, add it to the word parameter of this game object
        $random_word = $word_options[array_rand($word_options)];
        $this->word = str_split($random_word);

        $this->guesses_left = 6;
        $this->guesses_made = 0;

        // a new game starts out with no guesses
        $this->all_guesses = array();

        // a new game starts out with no correctly guessed letters
        $this->guessed_indices = array();
    }



    // setters

    // take new_word as string, add to word property as an array of letters
    function setWord ($new_word)
    {
        $this->word = str_split($new_word);
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
    function getGuessedIndices()
    {
        return $this->guessed_indices;
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

    function checkGuess($guess_to_check)
    {
        $count = 0;

        foreach ($this->getWord() as $current_letter) {
            // does this guess match the current letter?
            // if yes, add the current index to guessed indices
            // if yes, also change correct param of this guess to true
            // if no, move on to next letter
            if ($guess_to_check->getLetter() == $current_letter) {
                array_push($this->guessed_indices, $count);
                $guess_to_check->setCorrect("true");
            }

            $count++;
        }
    }


    static function getCurrentGame()
    {
        return $_SESSION['current_game'];
    }
}
?>
