package Files;

import java.io.File; //Classa e fajllave
import java.io.FileWriter; // Classa per shkrimin e fajllave
import java.io.IOException; // per te shfaqur errorat

/*
 * Per te hapur nje file ne java perdorin metoden 
 * */
public class CreateAndWrite {
	public static void main(String[] args) {
		/* Krijimi i Falljave */
		// Krijohen me createNewFile();
		try {
			File obj = new File("File.txt");
			File obj2 = new File("File.txt");
//			File obj2 = new File("C:\\Users\\Alpet Gexha\\eclipse-workspace\\AlpetG\\src\\Files.txt"); // Per fijlla me path
																									// te caktuar

			if (obj.createNewFile()) {
				System.out.println("Fajlli " + obj.getName() + " u krijua me sukses \nDhe  ndothen ne pathin: "
						+ obj.getAbsolutePath());
			} else {
				System.out.println("Fajlli ekziston \n " + obj.getAbsolutePath());
			}

		} catch (IOException e) {
			System.out.println("Ndodhi një gabim");
			e.printStackTrace();
		}

		/*
		 * Shkrimi i Fajllava Kjo metod perdoret vetem per te rishkruaj fallin , nese
		 * p.sh keni pasur dicka te shenuar ne file ajo nuk tod te ruhet po do te
		 * rishkruhet me ate qe keni jap ne funksions
		 */
		// Per te shkruaj nje file te caktuar perdorim metoden write() por pasi ta
		// perfudojn shkrimin duhet ta mbyllim me close()

		try {
			FileWriter objWritter = new FileWriter("File.txt");
			objWritter.write("Une Jam Alpet Gexha ,Ky eshte nje text tesutes per write() file \n");
			objWritter.close();
			System.out.println("Fjalli u Shkrua me sukses");

		} catch (Exception e) {
			System.out.println("Ndodhi një gabim");
			e.printStackTrace();
		}

	}
}
