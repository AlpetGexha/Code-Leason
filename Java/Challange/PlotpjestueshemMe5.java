package Challage;
import java.util.Scanner;
public class PlotpjestueshemMe5 {

	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		System.out.print("Jempni numerin: ");
		int number = s.nextInt();
		
		if( number % 5 == 0 ) {
			System.out.print("Numri " + number + " është i plotpjestueshëm me 5 ");

		} else {
			System.out.print("Numri " + number + " nuk është i plotpjestueshëm me 5 ");
		}
		

	}

}
