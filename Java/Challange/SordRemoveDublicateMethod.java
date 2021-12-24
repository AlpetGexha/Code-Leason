package Challange;

import java.util.*;

public class SordRemoveDublicateMethod {
	public static void main(String[] args) {
		Integer[] arr = { 1, 1, 1, 1, 2, 2, 2, 3, 1, 1, 2, 3, 4, 5, 5, 6, 1, 12, 31, 12, 1, 1, 1, 2, 2, 3, 4, 5, 1, 2 };
		TreeSet<Integer> tree = new TreeSet<Integer>();

		for (int i = 0; i < arr.length; i++) {
			tree.add(arr[i]);
		}

		arr = new Integer[tree.size()];
		tree.toArray(arr);
		for (int i = 0; i < arr.length; i++) {
			System.out.print(arr[i] + " ");
		}
	}
}