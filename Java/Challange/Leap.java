package Challage;

import java.util.Scanner;

//viti i brisht(29Shkurt)
public class Leap {
	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		System.out.print("Shkruani viti: ");
		int viti = s.nextInt();
		boolean isleap = ((viti % 4 == 0 && viti % 100 !=0) || (viti % 400 == 0));
		System.out.println("A është viti "+ viti + " a është vit i brisht "  +  isleap);
		
	}
}
