package Challage;
import java.util.Scanner;
public class llotaria {
	public static void main (String[] args) {
		
		while(true) {
		int lottarynumber=(int)(Math.random() *100);
		Scanner s = new Scanner(System.in);
		System.out.print("Jepni nje numer me dy shifra: ");
		int guessNumber = s.nextInt();
		int firstDigjitalLatary = lottarynumber / 10 ;
		int secondDigjitalLatary = lottarynumber % 10;
		int firstguessDigjtal = guessNumber / 10;
		int secondGuessDigjitalLataryecont = guessNumber % 10;
		System.out.println("Numri i kerkuar: "+ lottarynumber );
		 if (guessNumber == lottarynumber) System.out.println("Perputhje e plote! Keni fituar $20.000");
		 else if ((firstDigjitalLatary == secondGuessDigjitalLataryecont) && (secondDigjitalLatary == firstguessDigjtal))
		 System.out.println("Perpurdhje e pjeshme! Keni firuar $10.000");
		 else if ((firstDigjitalLatary == firstguessDigjtal) || (firstDigjitalLatary == secondGuessDigjitalLataryecont) || (secondDigjitalLatary == firstDigjitalLatary) || (secondDigjitalLatary == firstguessDigjtal))
		 System.out.println("Keni qelluar 1 numer! Keni fituar $1.000 ");
		 else System.out.println("Nuk keni qelluar as nje numer");
		 
		}
	}

}
