/**
 * author: yanyandenuonuo
 * create: 2018.05.07
 */

/**
 * 分割
 * @param unsortedArray
 * @param begin
 * @param end
 */
function mergeSort(unsortedArray, begin, end) {
    if (begin < end) {
        let splitIndex = Math.floor((begin + end) / 2);
        // 左侧排序
        mergeSort(unsortedArray, begin, splitIndex);
        // 右侧排序
        mergeSort(unsortedArray, splitIndex + 1, end);
        // 合并
        merge(unsortedArray, begin, splitIndex, end);
    }
}

/**
 * 合并
 * @param unsortedArray
 * @param begin
 * @param splitIndex
 * @param end
 */
function merge(unsortedArray, begin, splitIndex, end) {
    let sortedArray = [];
    let leftIndex = begin;
    let rightIndex = splitIndex + 1;
    let index = 0;
    // 合并
    while (leftIndex <= splitIndex && rightIndex <= end) {
        sortedArray[index++] = unsortedArray[leftIndex] < unsortedArray[rightIndex] ? unsortedArray[leftIndex++] : unsortedArray[rightIndex++];
    }
    // 追加左侧长的一侧数据
    while (leftIndex <= splitIndex) {
        sortedArray[index++] = unsortedArray[leftIndex++];
    }
    // 追加右侧长的一侧数据
    while (rightIndex <= end) {
        sortedArray[index++] = unsortedArray[rightIndex++];
    }
    for (index = 0; index < sortedArray.length; index += 1) {
        unsortedArray[begin + index] = sortedArray[index];
    }
    console.log("merge(unsortedArray, " + begin.toString() + ", " + splitIndex.toString() + ", " + end.toString() + ")");
    console.log(unsortedArray);
}

// 待排序的数组
let unsortedArray = [3, 2, 1, 4, 5, 2, 0];

// 调用
mergeSort(unsortedArray, 0, unsortedArray.length - 1);

// 打印输出
console.log(unsortedArray);