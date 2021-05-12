package Challage;
import java.util.Scanner;
public class quiz {
	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		System.out.println("Sa dite ka java \na)12 \t b)7 \t c)5");
		char answar = ' ';
		System.out.print("pegjigja juaj është: ");
		 answar = s.nextLine().charAt(0);
		 
		 switch (answar) {
		 case 'a':
			 System.out.println("incorrect");
			 break;
		 case 'b':
			 System.out.println("correct");
			 break;
		 case 'c':
			 System.out.println("incorrect");
			 break;
		 case 'd':
			 System.out.println("incorrect");
			 break;
		default:
			System.out.println("invalied");
		
		}
	
	}
}
