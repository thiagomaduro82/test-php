<?php

namespace App\Classes;

class PrimeNumber
{

    public function prime($number)
    {
        $multiples = [];
        for ($count = 1; $count <= $number; $count++) {
            if ($number % $count == 0) {
                array_push($multiples, $count);
            }
        }
        return $multiples;
    }

    public function printArray($array)
    {
        $arrayString = "[";
        foreach ($array as $item) {
            $arrayString = $arrayString . $item . ",";
        }
        $arrayString = rtrim($arrayString, ",") . "]";
        return $arrayString;
    }

    public function mainPrime()
    {
        for ($i = 1; $i <= 100; $i++) {
            $result = $this->prime($i);
            if (count($result) == 1 || count($result) == 2) {
                echo $i . " => " . $this->printArray($result) . " - <strong>[PRIME]</strong>" . "<br />";
            } else {
                echo $i . " => " . $this->printArray($result) . "<br />";
            }
        }
    }
}
