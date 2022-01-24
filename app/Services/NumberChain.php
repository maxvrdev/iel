<?php

namespace App\Services;

class NumberChain
{
    public $number;

    function squaredIntegerSum(int $integer): int
    {
        # Convert the number to an array
        $array = str_split($integer);

        # Count how many individual integers make up the number
        $count = count($array);

        # Create an array
        $col = [];

        # Take each one of the integers, find the square root add to array
        for ($x = 0; $x < $count; $x++) {
            $col[] = pow($array[$x], 2);
        }

        # The sum of the array
        return array_sum($col);
    }

    function numberChain(int $int)
    {
        # Create the first link of the chain and assign it to the global variable
        $this->number = $this->squaredIntegerSum($int);

        # Loop through the every number (create links in the chain) until the number arrives at either 1 or 89
        while (($this->number !== 89) && ($this->number !== 1)) {
            $this->number = $this->squaredIntegerSum($this->number);
        }

        if ($this->number === 1) {
            return false;
        }

        if ($this->number === 89) {
            return true;
        }
    }

    function numChainScore(int $top) {

        $score = 0;

        # Descend the loop and keep score.
        for ($n = $top; $n >= 1; $n--) {

            # The score gets a point when the number is 89.
            if ($this->numberChain($n)) {
                $score++;
            }
        }

        return $score;
    }



}
