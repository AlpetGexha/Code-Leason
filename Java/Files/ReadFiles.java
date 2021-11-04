package Files;

import java.io.File; // Import the File class
import java.io.FileNotFoundException; // Import this class to handle errors
import java.util.Scanner; // Import the Scanner class to read text files

public class ReadFiles {
	public static void main(String[] args) {

		/* File Read */
		try {
			File obj = new File("File.txt");
			Scanner s = new Scanner(obj);
			while (s.hasNextLine()) {
				String data = s.nextLine();
				System.out.println(data);
			}
			s.close();
		} catch (FileNotFoundException e) {
			System.out.println("Ndodhi një gabim.");
			e.printStackTrace();
		}

		/* File info */
		File myObj = new File("Files.txt");
		if (myObj.exists()) {
			System.out.println("File name: " + myObj.getName());
			System.out.println("Absolute path: " + myObj.getAbsolutePath());
			System.out.println("Writeable: " + myObj.canWrite());
			System.out.println("Readable " + myObj.canRead());
			System.out.println("Madhesia " + myObj.length() + " Byte");
		} else {
			System.out.println("The file does not exist.");
		}

	}
}
