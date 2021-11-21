package Challange;
import java.util.Scanner;
public class LinearSearch {
	public static int linearSearch(int[] x, int key) {
		for(int i = 0 ; i < x.length; i++) {
			
			if(x[i] == key) {
				return i;
			}
		
		}
		return -1;
	}
	
	
	public static void main(String[] args) {
		int[] x = {1,4,3,5,3,6,7,8,9,05,11,32,123,43,54,346,6342,432,123,13,1234};
//		int key = 1;
		Scanner s = new Scanner(System.in);
		while(true) {
			System.out.print("Shkruani numrin: ");
			int key = s.nextInt();
			System.out.println(key +  " gjendet në indeksin: "+ linearSearch(x, key)+  "\n");
		}
	}
	
}
