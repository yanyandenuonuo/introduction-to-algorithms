func quickSort(arr []int, leftIdx, rightIdx int) []int {
	if leftIdx < rightIdx {
		targetIdx := partition(arr, leftIdx, rightIdx)
		arr = partition(arr, leftIdx, targetIdx-1)
		arr = partition(arr, targetIdx+1, rightIdx)
	}
	return arr
}

func partition(arr []int, leftIdx, rightIdx int) int {
	targetIdx := leftIdx
	changeIdx := targetIdx + 1
	for idx := changeIdx; idx < rightIdx; idx += 1 {
		if arr[idx] < arr[targetIdx] {
			arr[idx], arr[changeIdx] = arr[changeIdx], arr[idx]
			changeIdx += 1
		}
	}
	arr[targetIdx], arr[changeIdx-1] = arr[changeIdx-1], arr[targetIdx]
	return changeIdx - 1
}