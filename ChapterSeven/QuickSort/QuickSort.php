<?php

/**
 * author: yanyandenuonuo
 * create: 2018.05.08
 */

// 待排序的数组
$unsortedArray = [3, 2, 1, 4, 5, 2, 0];

/**
 * 递归排序
 * @param $unsortedArray
 * @param $begin
 * @param $end
 */
function quickSort(&$unsortedArray, $begin, $end) {
    if($begin < $end) {
        $splitIndex = partition($unsortedArray, $begin, $end);
        quickSort($unsortedArray, $begin, $splitIndex - 1);
        quickSort($unsortedArray, $splitIndex + 1, $end);
    }
}

/**
 * 分割
 * @param $unsortedArray
 * @param $begin
 * @param $end
 * @return int
 */
function partition(&$unsortedArray, $begin, $end) {
    $endValue = $unsortedArray[$end];
    $splitIndex = $begin - 1;
    for($index = $begin; $index <= $end; $index += 1) {
        if($unsortedArray[$index] <= $endValue) {
            $splitIndex += 1;
            exchange($unsortedArray[$splitIndex], $unsortedArray[$index]);
        }
    }
    return $splitIndex;
}

/**
 * 交换两个值
 * @param $a
 * @param $b
 */
function exchange(&$a, &$b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
}

// 调用
quickSort($unsortedArray, 0, count($unsortedArray) - 1);

// 打印输出
var_dump($unsortedArray);
