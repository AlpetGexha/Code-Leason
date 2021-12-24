package Challange;

public class SordRemoveDublicate {
	public static int removeDuplicate(int arr[], int n) {
		if (n == 0 || n == 1) {
			return n;
		}
		int[] temp = new int[n];
		int j = 0;
		for (int i = 0; i < n - 1; i++) {
			if (arr[i] != arr[i + 1]) {
				temp[j++] = arr[i];
			}
		}
		temp[j++] = arr[n - 1];
		// Changing original array
		for (int i = 0; i < j; i++) {
			arr[i] = temp[i];
		}
		return j;
	}

	public static int rsort(int[] arr) {
		int temp;
		for (int i = 0; i <= arr.length - 1; i++) {
			for (int j = 0; j <= arr.length - 2; j++) {
				if (arr[j] > arr[j + 1]) // sort
				{
					temp = arr[j];
					arr[j] = arr[j + 1];
					arr[j + 1] = temp;
				}
			}
		}
		for (int num : arr) {
			// System.out.print(num);
			return num;
		}
		return -1;
	}

	public static void main(String[] args) {
		int[] arr = { 1, 1, 1, 2, 2, 3, 4, 5, 6, 6, 6, 6, 1, 1, 1, 1, 2, 2, 3, 4, 5, 1, 1, 1, 2, 2, 3, 3, 4, 5, 1, 1, 1,
				2, 2, 31, 3, 5, 5, 4, 1, 23, 3, 12, 31, 1, 1, 1, 1, 1, 1, 111, 2, 3, 3, 21, 312, 1, 12, 312, };
		rsort(arr);
		int length = arr.length;
		length = removeDuplicate(arr, length);

		for (int i = 0; i < length; i++) {
			System.out.print(arr[i]);
			if (i != length - 1) {
				System.out.print(",");
			}
		}

	}
}
