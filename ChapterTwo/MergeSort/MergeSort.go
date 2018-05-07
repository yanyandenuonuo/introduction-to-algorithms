package main

/**
 * author: yanyandenuonuo
 * create: 2018.05.07
 * comment: 注意array和slice的区别，如声明和初始化方式、获取长度和容量、传值or引用
 */

import (
    "fmt"
)

func main() {
	// 待排序的数组
    var unsortedArray = [] int {3, 2, 1, 4, 5, 2, 0}

    // 调用
    mergeSort(unsortedArray, 0, len(unsortedArray) - 1)

    // 打印输出
    fmt.Printf("%v", unsortedArray)
}

/**
 * 分割
 * @param unsortedArray [] int
 * @param begin int
 * @param end int
 */
func mergeSort(unsortedArray [] int, begin int, end int) {
    if begin < end {
        fmt.Printf("begin is %d and end is %d\n", begin, end)
        splitIndex := (begin + end) / 2
        // 左侧排序
        fmt.Printf("unsortedArray(unsortedArray, %d, %d)\n", begin, splitIndex)
        mergeSort(unsortedArray, begin, splitIndex)
        // 右侧排序
        fmt.Printf("unsortedArray(unsortedArray, %d + 1, %d)\n", splitIndex, end)
        mergeSort(unsortedArray, splitIndex + 1, end)
        // 合并
        fmt.Printf("merge(unsortedArray, %d, %d, %d)\n", begin, splitIndex, end)
        merge(unsortedArray, begin, splitIndex, end)
    }
}

/**
 * 合并
 * @param unsortedArray [] int
 * @param begin int
 * @param splitIndex int
 * @param end int
 */
func merge(unsortedArray [] int, begin int, splitIndex int, end int) {
    leftIndex := begin
    rightIndex := splitIndex + 1
    sortedArray := make([] int, end - begin + 1)
    index := 0
    // 合并
    for leftIndex <= splitIndex && rightIndex <= end {
        if unsortedArray[leftIndex] < unsortedArray[rightIndex] {
            sortedArray[index] = unsortedArray[leftIndex]
            leftIndex += 1
        } else {
            sortedArray[index] = unsortedArray[rightIndex]
            rightIndex += 1
        }
        index += 1
    }
    // 追加左侧长的一侧数据
    for leftIndex <= splitIndex {
        sortedArray[index] = unsortedArray[leftIndex]
        index += 1
        leftIndex += 1
    }
    // 追加右侧长的一侧数据
    for rightIndex <= end {
        sortedArray[index] = unsortedArray[rightIndex]
        index += 1
        rightIndex += 1
    }
    for index = 0; index < len(sortedArray); index += 1 {
        unsortedArray[begin + index] = sortedArray[index]
    }
}
