package Challage;
import java.util.Scanner;
public interface convert_temp {
	public static void main(String[] args) {
		Scanner s = new Scanner (System.in);
		System.out.print("Shruani Tempreaturen: ");
		double temp = s.nextDouble();
		
		double temp1 = (5.0/9.0) * (temp - 32);
		System.out.println(temp1);

	}
}
