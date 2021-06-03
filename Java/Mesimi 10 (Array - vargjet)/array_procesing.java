package array;
import java.util.Scanner;
public class array_procesing {
 public static void main(String[] args) {
	

	Scanner s = new Scanner(System.in);
	
	String[] studentat = new String[10];
//	int s_leght = studentat.length;
	System.out.print("Shruani " + studentat.length + " vlera: ");
	
	for(int i = 0; i < studentat.length; 	i++) {
		System.out.print("Shruani elementin e1 " + (i+1) + " te vargut: ");
		studentat[i] = s.nextLine();
	}
	
	System.out.println("Vargu eshte i mbushur");
	for(int b = 0; b < studentat.length; b++ ) {
		System.out.println(studentat[b]);
		
		}

 }
}
