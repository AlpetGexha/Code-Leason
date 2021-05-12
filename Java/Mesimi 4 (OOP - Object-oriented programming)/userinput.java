package OOP;

import java.util.Scanner; //duhet te importohet Scanneri per 

public class userinput {

	public static void main(String[] args) {
			 
		 
			 Scanner s=new Scanner(System.in);
			 System.out.print("Ju lutem shkruani emrin: ");
			 String name = s.nextLine();
//			 System.out.print("Ju jeni" + name);
			 System.out.print("jepni moshen: ");
			 int mosha = s.nextInt();
			 System.out.print("Cmimin e produktit: ");
			 double cmimi = s.nextDouble();
			 System.out.print( "Ju jeni "+ name+ "mosha " + mosha + "fatura  " + cmimi);

	}

}
