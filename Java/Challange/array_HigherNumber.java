package Challage;
import java.util.Scanner;
public class array_HigherNumber {

public static void main(String[] args) {
	Scanner s = new Scanner (System.in);
//	int[] number = new int[6];
//	int sum = 0;
//	for(int i = 0; i < number.length; 	i++) {
//		System.out.print("Shrunai numrat: ");
//		number[i] = s.nextInt();
//		sum+=number[1];
//		
//				
//	}
//	
//	System.out.println("  Vlera e vargur: " + sum);
	
	int[] number = {1,4,6,7,2000};
	int max = number[0];
//	System.out.print(Math.max(Math.max(max[0], max[1]), Math.max(max[2], max[3])));	
	
	for(int i = 0; i < number.length; i++) {

		
		if(number[i] > max) {
			max = number[i];
		}
		
		
	}
	System.out.print("Numri më i madhë në varg është " +max);
}
	
}
