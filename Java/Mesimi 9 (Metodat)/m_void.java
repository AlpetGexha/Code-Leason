package metodat;
import java.util.Scanner;
public class m_void {
	// shkruhet permi medotes main
	
					   //emri  //gjimon duhet te dregot se cfare duhet te shruaj "int"
	public static void score(int score) {
		if (score > 50) {System.out.println("Invalid");}
		else if (score > 45) { System.out.println("Ju keni marrë notën 5"); }
		else if (score > 40) { System.out.println("Ju keni marrë notën 4"); }
		else if (score > 30) { System.out.println("Ju keni marrë notën 3"); }
		else if (score > 20) { System.out.println("Ju keni marrë notën 2"); }
		else{ System.out.println("Ju keni marrë notën 1"); }
	}

	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		while(true) {
			System.out.print("Sa pikë keni marrë: ");
			int piket = s.nextInt();
			
			score(piket);
		}
	}
}
