<?php

/**
 * author: yanyandenuonuo
 * create: 2018.05.04
 */

// 待排序的数组
$unsortedArray = [3, 2, 1, 4, 5, 2, 0];

// 排序过程
for($index = 1; $index < count($unsortedArray); $index += 1) {
    $temp = $unsortedArray[$index];
    $subIndex = $index - 1;
    while($subIndex >= 0 && $unsortedArray[$subIndex] > $temp) {
        $unsortedArray[$subIndex + 1] = $unsortedArray[$subIndex];
        $subIndex -= 1;
    }
    $unsortedArray[$subIndex + 1] = $temp;
}

// 打印输出
var_dump($unsortedArray);
