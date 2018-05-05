/**
 * author: yanyandenuonuo
 * create: 2018.05.04
 */

// 待排序的数组
let unsortedArray = [3, 2, 1, 4, 5, 2, 0];

// 排序过程
for(let index = 1; index < unsortedArray.length; index += 1) {
    let temp = unsortedArray[index];
    let subIndex = index - 1;
    while(subIndex >= 0 && unsortedArray[subIndex] > temp) {
        unsortedArray[subIndex + 1] = unsortedArray[subIndex];
        subIndex -= 1;
    }
    unsortedArray[subIndex + 1] = temp;
}

// 打印输出
console.log(unsortedArray);
