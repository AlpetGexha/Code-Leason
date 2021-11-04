package Files;

import java.io.File; // Importi per classen e fajllave

public class Files {
	public static void main(String[] args) {
		File obj = new File("text.txt"); //Per Krijimin e folderave
		
		System.out.println("Creta File");
		System.out.println("Can read: " + obj.canRead());
		System.out.println("Can Write: " + obj.canWrite());
		System.out.println("Exists: " + obj.exists());
		System.out.println("Length: " + obj.length());
		System.out.println("mkrdir: " + obj.mkdir());
		System.out.println("Get Absolute Path: " + obj.getAbsolutePath());

		/*
		 * Disa nga metodat e Fajllave jane
		 * 
		 * canRead() boolena Teston nese Fajlli eshte i lexueshem apo jo
		 * 
		 * canWrite() boolean Teston nese fajlli eshte i Shruajtur apo jo
		 * 
		 * createNewFile() boolean Krijon nje fajll te ri bosh
		 * 
		 * delete() bolean Fshin Fajllin
		 * 
		 * exists() bolean Tregon a egziston fajlli apo jo
		 * 
		 * getName() String kthen emrin e fajllit
		 * 
		 * getAbsolutePath() String Kthen pathin e fajllits
		 * 
		 * length() Long Kthen mathezin e fajllit ne byte
		 * 
		 * mkdir() bolean Krijon një direktori
		 * 
		 * 
		 * 
		 * 
		 * 
		 * 
		 */
	}

}
