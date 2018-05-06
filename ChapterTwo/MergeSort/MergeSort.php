<?php

/**
 * author: yanyandenuonuo
 * create: 2018.05.06
 */

// 待排序的数组
$unsortedArray = [3, 2, 1, 4, 5, 2, 0];

/**
 * 分割
 * @param $unsortedArray
 * @param $begin
 * @param $end
 */
function mergeSort(&$unsortedArray, $begin, $end) {
    if($begin < $end) {
        $splitIndex = floor(($begin + $end) / 2);
        // 左侧排序
        mergeSort($unsortedArray, $begin, $splitIndex);
        // 右侧排序
        mergeSort($unsortedArray, $splitIndex + 1, $end);
        // 合并
        merge($unsortedArray, $begin, $splitIndex, $end);
    }
}

/**
 * 合并
 * @param $unsortedArray
 * @param $begin
 * @param $splitIndex
 * @param $end
 */
function merge(&$unsortedArray, $begin, $splitIndex, $end) {
    $sortedArray = [];
    $leftIndex = $begin;
    $rightIndex = $splitIndex + 1;
    // 合并
    while($leftIndex <= $splitIndex && $rightIndex <= $end) {
        $sortedArray[] = $unsortedArray[$leftIndex] < $unsortedArray[$rightIndex] ? $unsortedArray[$leftIndex++] : $unsortedArray[$rightIndex++];
    }
    // 追加左侧长的一侧数据
    while($leftIndex <= $splitIndex) {
        $sortedArray[] = $unsortedArray[$leftIndex++];
    }
    // 追加右侧长的一侧数据
    while($rightIndex <= $end) {
        $sortedArray[] = $unsortedArray[$rightIndex++];
    }
    for($index = 0; $index < count($sortedArray); $index += 1) {
        $unsortedArray[$begin + $index] = $sortedArray[$index];
    }
}

// 调用
mergeSort($unsortedArray, 0, count($unsortedArray) - 1);
// 打印输出
var_dump($unsortedArray);
