package Challage;
import java.util.Scanner;
public class Guess_number {
	public static void main(String[] args) {
		
		Scanner s = new Scanner (System.in);
		int number1 = (int) (Math.random() *10);
		int number2 = (int) (Math.random() *10);
		int count = 1;
		
		System.out.print("Sa është " + number1 + " +" + number2 + "?: ");
		int guess = s.nextInt();
		
		
		while (number1 + number2 != guess) {
			System.out.print("Gabim! Sa është " + number1 + " +" + number2 + " ?" );
			guess = s.nextInt();
			count++;
			
		}
		System.out.println("Sakt Pas " + count + " tentike");
	}
}
