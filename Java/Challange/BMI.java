package Challage;
import java.util.Scanner;
public class BMI {
	public static void main (String[] args) {
		Scanner s = new Scanner(System.in);
		char choise;
		do {
			
			System.out.print("Jepni Peshën: ");
			double pesha = s.nextDouble();
			System.out.print("Jepni Gjatësin: ");
			double gjatesia = s.nextDouble();
			double BMI = pesha / (Math.pow(gjatesia, 2));
			
			System.out.println(BMI);
			
			if(BMI < 18.5) { System.out.println("Nënpeshë"); }
			else if(BMI < 25.0) { System.out.println("Nënpeshë"); }
			else if(BMI < 30.0) { System.out.println("Nënpeshë"); }
			else if(BMI > 30.0) { System.out.println("Nënpeshë"); }
			
			System.out.print("Për të vazhduar prekni x: ");
			choise = s.next().charAt(0);
			
		}while(choise == 'x' || choise == 'X');
		
		
	}
}
