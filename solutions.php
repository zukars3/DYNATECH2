<?php

function maxProfit(array $pricesAndPurchases): int
{
    $prices = [];
    $i = 0;
    foreach ($pricesAndPurchases as $day) {
        $pricesAndPurchases[$i]['spent'] = $day['price'] * $day['purchased'];
        $prices[] = $day['price'];
        $i++;
    }

    $maxPriceDayIndex = array_keys($prices, max($prices))[0];

    $pricesAndPurchasesSorted = $pricesAndPurchases;
    arsort($pricesAndPurchasesSorted);

    $topDays = [];
    foreach ($pricesAndPurchasesSorted as $priceAndPurchase) {
        $topDays[] = $priceAndPurchase;
    }

    $secondMaxPrice = $topDays[1];
    $secondMaxPriceIndex = array_search($secondMaxPrice, $pricesAndPurchases);

    $thirdMaxPrice = $topDays[2];

    if ($secondMaxPrice['price'] == $thirdMaxPrice['price']) {
        $sellDays = 1;
    } else {
        $sellDays = 2;
    }

    $totalSpent = 0;
    $oilOnFirstHalf = 0;
    $oilOnSecondHalf = 0;
    $incomeOnSecondHalf = 0;

    for ($i = 0; $i <= $maxPriceDayIndex; $i++) {
        $oilOnFirstHalf = $oilOnFirstHalf + $pricesAndPurchases[$i]['purchased'];
        $totalSpent = $totalSpent + $pricesAndPurchases[$i]['spent'];
    }
    $incomeOnFirstHalf = $oilOnFirstHalf * $pricesAndPurchases[$maxPriceDayIndex]['price'];

    if ($sellDays == 2) {
        $firstSellDay = $maxPriceDayIndex < $secondMaxPriceIndex ? $maxPriceDayIndex : $secondMaxPriceIndex;
        $secondSellDay = $maxPriceDayIndex < $secondMaxPriceIndex ? $secondMaxPriceIndex : $maxPriceDayIndex;

        for ($i = $firstSellDay + 1; $i <= $secondSellDay; $i++) {
            $oilOnSecondHalf = $oilOnSecondHalf + $pricesAndPurchases[$i]['purchased'];
            $totalSpent = $totalSpent + $pricesAndPurchases[$i]['spent'];
        }

        $incomeOnSecondHalf = $oilOnSecondHalf * $pricesAndPurchases[$secondSellDay]['price'];
    }

    return ($incomeOnFirstHalf + $incomeOnSecondHalf) - $totalSpent;
}

function stringCost(string $a, string $b,
                    int $insertionCost, int $deletionCost, int $replacementCost): int
{
    $stringA = str_split($a);
    $stringB = str_split($b);

    $stringALength = strlen($a);
    $stringBLength = strlen($b);
    $longestLength = max($stringALength, $stringBLength);

    $useReplace = ($insertionCost + $deletionCost > $replacementCost);
    $cost = 0;

    if ($a == $b) {
        $cost = 0;
    } elseif ($stringALength == 0 || $stringBLength == 0) {
        $cost = $insertionCost * $longestLength;
    } elseif ($longestLength == 1) {
        $useReplace ? $cost = $replacementCost : $cost = $deletionCost + $insertionCost;
    } else {
        for ($i = 0; $i < $longestLength; $i++) {
            if ($i < $longestLength - 1) {

                if ($stringA[$i] !== $stringB[$i]) {
                    $useReplace ? $cost = $cost + $replacementCost : $cost = $cost + $deletionCost + $insertionCost;
                }

            } else {
                $cost = $cost + $insertionCost;
            }
        }
    }
    return $cost;
}

function incrementalMedian(array $values): array
{
    sort($values);
    $result = [$values[0]];

    for ($i = 0; $i < count($values) - 1; $i++) {
        $partOfValues = array_slice($values, 0, $i + 2);

        $halfOfLength = round(count($partOfValues) / 2);
        $result[] = $values[$halfOfLength - 1];
    }
    return $result;
}

echo maxProfit([
        0 => ['price' => 2, 'purchased' => 3],
        1 => ['price' => 3, 'purchased' => 0],
        2 => ['price' => 1, 'purchased' => 1],
        3 => ['price' => 5, 'purchased' => 4],
        4 => ['price' => 3, 'purchased' => 1],
        5 => ['price' => 2, 'purchased' => 2]
    ]) . PHP_EOL;

echo implode(" ", incrementalMedian([1, 8, 4, 7, 13])) . PHP_EOL;

echo stringCost('bitten', 'meeting', 1, 1, 1) . PHP_EOL;