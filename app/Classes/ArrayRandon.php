<?php

namespace App\Classes;

class ArrayRandon
{
    public function arrayGenerateAscII()
    {
        $array = [];
        for ($i = 0; $i <= 255; $i++) {
            array_push($array, utf8_encode(chr($i)));
        }
        return $array;
    }

    public function removeItemArray($key, $array)
    {
        unset($array[$key]);
        return $array;
    }

    public function showArray()
    {
        $resultArray = $this->arrayGenerateAscII();
        foreach ($resultArray as $item) {
            echo $item . "</br>";
        }
    }

    public function mainArray()
    {
        $array = $this->arrayGenerateAscII();
        $arrayRemoved = $this->removeItemArray(array_rand($array), $array);
        $arrayDiff = array_diff($array, $arrayRemoved);
        return [
            "array" => $array,
            "arrayRemoved" => $arrayRemoved,
            "arrayDiff" => $arrayDiff
        ];
    }
}
