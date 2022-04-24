<?php

namespace App\Classes;

use Exads\ABTestData;

class ABTesting
{

    public function __construct()
    {
        session_start();
    }

    public function getData(int $promoId): array
    {
        $abTest = new ABTestData($promoId);
        $promotion = $abTest->getPromotionName();
        $designs = $abTest->getAllDesigns();
        return $designs;
    }

    public function generateControl($array)
    {
        $_SESSION['control']['total'] = 0;
        $_SESSION['control']['designers'] = [];
        foreach ($array as $item) {
            array_push($_SESSION['control']['designers'], [
                "name" => $item['designName'],
                "splitPercent" => $item['splitPercent'],
                "visitorsNumber" => 0,
                "currentPercentage" => 0
            ]);
        }
    }

    public function highestValue()
    {
        $designers = $_SESSION['control']['designers'];
        $highestValue = 0;
        $indexHighestValue = -1;
        for ($i = 0; $i < count($designers); $i++) {
            if ($highestValue < $designers[$i]['splitPercent']) {
                $highestValue = $designers[$i]['splitPercent'];
                $indexHighestValue = $i;
            }
        }
        return $indexHighestValue;
    }

    public function checkPercent()
    {
        $designers = $_SESSION['control']['designers'];
        $indexLowerPercent = -1;
        for ($i = 0; $i < count($designers); $i++) {
            if ($designers[$i]['currentPercentage'] < $designers[$i]['splitPercent']) {
                $indexLowerPercent = $i;
            }
        }
        return $indexLowerPercent;
    }

    public function refreshPercent()
    {
        $designers = $_SESSION['control']['designers'];
        for ($i = 0; $i < count($designers); $i++) {
            $_SESSION['control']['designers'][$i]['currentPercentage'] =
                (($_SESSION['control']['designers'][$i]['visitorsNumber'] * 100) / $_SESSION['control']['total']);
        }
    }

    public function main()
    {
        if ($_SESSION['control']['total'] == 0) {
            $index = $this->highestValue();
        } else {
            $index = $this->checkPercent();
        }
        $_SESSION['control']['total'] += 1;
        $_SESSION['control']['designers'][$index]['visitorsNumber'] += 1;
        $this->refreshPercent();
    }
}
