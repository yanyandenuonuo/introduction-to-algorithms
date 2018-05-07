#!/usr/bin/python
# -*- coding: UTF-8 -*-

"""
 # author: yanyandenuonuo
 # create: 2018.05.06
"""

import math


# 待排序的数组
unsortedArray = [3, 2, 1, 4, 5, 2, 0]
counter = [0]


def merge_sort(unsorted_array, begin, end):
    """
    分割
    :param unsorted_array:
    :param begin:
    :param end:
    :return:
    """
    if begin < end:
        split_index = math.floor((begin + end) / 2)
        # 左侧排序
        merge_sort(unsorted_array, begin, split_index)
        # 右侧排序
        merge_sort(unsorted_array, split_index + 1, end)
        # 合并
        merge(unsorted_array, begin, split_index, end)


def merge(unsorted_array, begin, split_index, end):
    """
    合并
    :param unsorted_array:
    :param begin:
    :param split_index:
    :param end:
    :return:
    """
    sorted_array = []
    left_index = begin
    right_index = split_index + 1
    # 合并
    while left_index <= split_index and right_index <= end:
        if unsorted_array[left_index] < unsorted_array[right_index]:
            sorted_array.append(unsorted_array[left_index])
            left_index += 1
        else:
            sorted_array.append(unsorted_array[right_index])
            right_index += 1
    # 追加左侧长的一侧数据
    while left_index <= split_index:
        sorted_array.append(unsorted_array[left_index])
        left_index += 1
    # 追加右侧长的一侧数据
    while right_index <= end:
        sorted_array.append(unsorted_array[right_index])
        right_index += 1
    for index in range(0, len(sorted_array)):
        unsorted_array[begin + index] = sorted_array[index]


# 调用
merge_sort(unsortedArray, 0, len(unsortedArray) - 1)

# 打印输出
print(unsortedArray)
