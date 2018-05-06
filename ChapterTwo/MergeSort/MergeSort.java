package ChapterTwo.MergeSort;

import java.util.Arrays;

/**
 * author: yanyandenuonuo
 * create: 2018.05.06
 */
public class Main {
    
    public static void main(String [] args) throws Exception {
        // 待排序的数组
        Integer [] unsortedArray = new Integer [] {3, 2, 1, 4, 5, 2, 0};

        // 调用
        mergeSort(unsortedArray, 0, unsortedArray.length - 1);

        // 打印输出
        System.out.print(Arrays.toString(unsortedArray));
    }

    /**
     * 分割
     * @param unsortedArray Integer []
     * @param begin Integer
     * @param end Integer
     */
    private static void mergeSort(Integer [] unsortedArray, Integer begin, Integer end) {
        if(begin < end) {
            Integer splitIndex = Math.floorDiv(begin + end, 2);
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
     * @param unsortedArray Integer []
     * @param begin Integer
     * @param splitIndex Integer
     * @param end Integer
     */
    private static void merge(Integer [] unsortedArray, Integer begin, Integer splitIndex, Integer end) {
        Integer [] sortedArray = new Integer[end - begin + 1];
        int leftIndex = begin;
        int rightIndex = splitIndex + 1;
        int index = 0;
        // 合并
        while(leftIndex <= splitIndex && rightIndex <= end) {
            sortedArray[index++] = unsortedArray[leftIndex] < unsortedArray[rightIndex] ? unsortedArray[leftIndex++] : unsortedArray[rightIndex++];
        }
        // 追加左侧长的一侧数据
        while(leftIndex <= splitIndex) {
            sortedArray[index++] = unsortedArray[leftIndex++];
        }
        // 追加右侧长的一侧数据
        while(rightIndex <= end) {
            sortedArray[index++] = unsortedArray[rightIndex++];
        }
        for(index = 0; index < sortedArray.length; index += 1) {
            unsortedArray[begin + index] = sortedArray[index];
        }
    }
}
