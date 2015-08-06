<?php
class Guess {
    private $letter;
    private $correct;

    // getters
    function getLetter()
    {
        return $this->letter;
    }

    function isCorrect()
    {
        return $this->correct;
    }

    // is "bool" correct?
    function setCorrect($new_bool)
    {
        $this->correct = (bool) $new_bool;
    }

    // assume stupid user guessed wrong until proven otherwise
    function __construct($new_letter)
    {
        $this->letter = $new_letter;
        $this->correct = false;
    }
    
}
?>
