package Challage;
import java.util.Scanner;
public class math_x_y {
	public static void main(String[] args) {
	Scanner s = new Scanner (System.in);
	int numer1 , numer2;
	char choice;
	
	do {
		System.out.print("Jepni numrin e pare "); numer1 = s.nextInt();
		System.out.print("Jepni numrin e dyte "); numer2 = s.nextInt();
		int sum = numer1 + numer2 ;
		System.out.print("Shuma mes " + numer1 + " dhe " + numer2 + " eshte " + sum);
		System.out.print("\nDeshironi Perseri");
		choice = s.next().charAt(0);
		System.out.println("");
	}while (choice == 'y' || choice == 'Y');

	}
}
