<?php

class Mathematique {

    public function addition(int $a, int $b)
    {
        return $a + $b;
    }

    public function soustraction(int $a, int $b)
    {
        return $a - $b;
    }

    public function multiplication(int $a, int $b)
    {
        return $a * $b;
    }

    public function division(int $a, int $b)
    {
        if ($a !== 0 || $b !== 0) {
            return $a / $b;
        }
    }
}