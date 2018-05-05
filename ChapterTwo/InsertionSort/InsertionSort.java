package ChapterTwo.InsertionSort;

import java.util.Arrays;

/**
 * author: yanyandenuonuo
 * create: 2018.05.04
 */
public class Main {
    
    public static void main(String [] args) throws Exception {
        // 待排序的数组
        Integer [] unsortedArray = new Integer [] {3, 2, 1, 4, 5, 2, 0};

        // 排序过程
        for(int index = 1; index < unsortedArray.length; index += 1) {
            int temp = unsortedArray[index];
            int subIndex = index - 1;
            while(subIndex >= 0 && unsortedArray[subIndex] > temp) {
                unsortedArray[subIndex + 1] = unsortedArray[subIndex];
                subIndex -= 1;
            }
            unsortedArray[subIndex + 1] = temp;
        }

        // 打印输出
        System.out.print(Arrays.toString(unsortedArray));
    }
}
