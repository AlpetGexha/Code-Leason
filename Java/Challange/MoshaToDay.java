package Challage;
import java.util.Scanner;
public class MoshaToDay {
	public static void main (String[] args) {
		Scanner s = new Scanner(System.in);
		
		while (true) {
			System.out.print("Jepni moshën: ");
			int mosha = s.nextInt();
			int d_mosha = 365 * mosha;
			
			System.out.println("Ju jeni " + d_mosha + " i vjetër");
		}
	}

}
