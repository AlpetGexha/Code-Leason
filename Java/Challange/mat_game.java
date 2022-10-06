package challange;

import java.util.Random;
import java.util.Scanner;

public class loja {
	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		Random rand = new Random();

		char choise;
		System.out.println("A doni me lujt lojen me numra zotni (y/n): ");

		choise = s.next().charAt(0);

		while (choise == 'y' || choise == 'Y') {
			int point = 0;
			int max_question = 10;

			for (int i = 1; i <= max_question; i++) {

				int numri1 = rand.nextInt(1000);
				int numri2 = rand.nextInt(1000);

				System.out.print(i + ".Sa është: " + numri1 + " + " + numri2 + ": ");
				int result = s.nextInt();

				if (result == (numri1 + numri2))
					point++;

				System.out.println("Ti i nderum i ki gjet vetem: " + (point - 1) + "/" + max_question);
				System.out.println("A don me lujt apet zotni i nderum (y/n): ");
				choise = s.next().charAt(0);
			}

			if (choise == 'n') {
				System.out.println("Hani hajt ik atje pra");
			}
		}
	}
}
