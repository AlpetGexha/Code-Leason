package Challage;
import java.util.Scanner;
public class ditet_e_javes {
	public static void main (String[] args) {
		Scanner s = new Scanner(System.in);

		while (true) {
			System.out.println("Per te hënën shtypni 1 \t \t Per te marten shtypni 2 \n"
					+ "Per te merkuren shtypni 3 \t Per te ejten shtypni 4 \n"
					+ "Per te premte shtypni 5 \t Per te shtune shtypni 6 \n" 
					+"Per te dielle shtypni 7");
			
			System.out.print("Cakto numrin: ");
			int number = s.nextInt();
			
			switch (number) {
			case 1:
			case 2:
			case 3:
			case 4:
			case 5:
				System.out.println("\n DITE PUNE  \n \n \n");
				break;
			case 6:
			case 7:
				System.out.println("\n dite pushimi  \n \n \n");
				break;
				default: 
					System.out.println("\n Invalid data \n \n \n ");
					
					
					
				} 
			}
		}
	}

