package Files;

import java.io.File;

public class DeleteFile {

	public static void main(String[] args) {
		/* Fshirja e fajllit */

		File obj = new File("Test.txt");

		if (obj.delete()) {
			System.out.println("Fajlli: " + obj.getName() + " u fshia me suksess");
		} else {
			System.out.println("Fshirja e fajllit deshtoj.");
		}

		/* Fshijra e folderit */
		File myObj = new File("C:\\Users\\Alpet\\Test");

		if (myObj.delete()) {
			System.out.println("Folderi : " + myObj.getName() + " u fshia me suksess");
		} else {
			System.out.println("Fshijra e folderit deshtoj .");
		}

	}

}
