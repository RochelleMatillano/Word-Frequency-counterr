<?php

/**
 * 
 *
 * @param array $items 
 * @return float
 */
function calculateTotalPrice(array $items): float {
    $total = 0;

    foreach ($items as $item) {
        $total += $item['price'];
    }

    return $total;
}

/**
 * 
 *
 * @param string $inputString 
 * @return string 
 */
function modifyString(string $inputString): string {
    return strtolower($inputString);
}

/**
 * 
 *
 * @param int $number 
 * @return string 
 */
function checkEvenOrOdd(int $number): string {
    return ($number % 2 == 0) ? "The number $number is even." : "The number $number is odd.";
}

$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];
$totalPrice = calculateTotalPrice($items);
echo "Total price: $" . $totalPrice . PHP_EOL;


$inputString = "This is a poorly written program with little structure and readability.";
$modifiedString = modifyString($inputString);
echo "Modified string: " . $modifiedString . PHP_EOL;


$number = 42;
$result = checkEvenOrOdd($number);
echo $result . PHP_EOL;