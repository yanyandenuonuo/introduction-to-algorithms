#!/usr/bin/python
# -*- coding: UTF-8 -*-

"""
 # author: yanyandenuonuo
 # create: 2018.05.04
"""


# 待排序的数组
unsortedArray = [3, 2, 1, 4, 5, 2, 0]

# 排序过程
for index in range(1, len(unsortedArray)):
    temp = unsortedArray[index]
    subIndex = index - 1
    while subIndex >= 0 and unsortedArray[subIndex] > temp :
        unsortedArray[subIndex + 1] = unsortedArray[subIndex]
        subIndex -= 1
    unsortedArray[subIndex + 1] = temp

# 打印输出
print(unsortedArray)
