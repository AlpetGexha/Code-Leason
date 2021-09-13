package Variablat2;

public class Variablat {

	public static void main(String[] arg) {
		
		String name = "String - Alpet"; //String vetem per tekts
		System.out.println(name);
		
		 String Shkolladigjitale; //Deklarimi i variabes
		 Shkolladigjitale = "2. Alpet Gexha"; //mbushje e saj
		 System.out.println(Shkolladigjitale);
		 
		 Shkolladigjitale = "3. AlpetG"; //overight Sting
		 System.out.println(Shkolladigjitale);
		 
		 byte bytenumber = 100; // vetem numrat -128 deri 127
		 System.out.println("byte Numrat (-128) Deri 127 " + bytenumber);
		 
		 
		 short shortnumer = 3000; // 32768
		 System.out.println("short Numrat deri në 32768 "+ shortnumer);
		 
		 
		 int intnumber = 59012;  // -9B deri 9B
		 System.out.println("int Numrat deri (-9B) deri 9B " + intnumber);
		 
		 
		 long longnumber = 93021391;
		 System.out.println("long Numrat 9B+ " + longnumber);
		 
		 
		 float floatnumber = 3.32f; // numrat me presje f(float)
		 System.out.println("float Numrat me \",\" " + floatnumber);
		 
		 
		 double doublenumber = 33.12; // numrat me presje
		 System.out.println("double Numrat me \",\" " + doublenumber);
		 
		 
		 char charkarakteret = 'A'; // vetem per 1 karakter
		 System.out.println("char vetëm një karakter  " + charkarakteret);
		 
		 final int finalint = 10;//cost int
		 System.out.println("Final vlera e pa ndryshuar"  + finalint);
		 
		 
		//Bashkimi i 2 stringave
		 String dita = "E hene";
		 System.out.println("Sot eshte dita" + dita);
		 
		 String school = "Shkolla" + " " + "Digjitale";
		 System.out.println(school + " 2020");
		 
		 
		 String s1 = "Shkolla";
		 String s2 = " Digjitale";
		 String s3 = s1.concat(s2); // concat bashkimi i stringave
		 System.out.println(s3);

		 
		 
		//convertimi i variablave automatike
		 int numri = 10;
		 double numri2 = numri;
		 System.out.println(numri);
		 System.out.println(numri2);
		 
		 
		 
		 double numri3 = 10.8;
		 int numri4 = (int)numri3;
		 System.out.println(numri3);
		 System.out.println(numri4);
		 
		
	}
}