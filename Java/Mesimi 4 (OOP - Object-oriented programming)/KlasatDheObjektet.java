/*OOP- Object-oriented programming
 * është një model programimi kompjuterik që organizon krijimin e softuerit rreth të dhënave,
 * ose objekteve, në vend se funksioneve dhe logjikës.
 * Një objekt mund të përcaktohet si një fushë e të dhënave që ka atribute dhe sjellje unike.
 * 
 */

package OOP;

//Emri i Klases
public class KlasatDheObjektet {
	int x = 4;
	int y = 5;

	static void staticMethod() {
		System.out.println("Une jamë Metoda statike");
	}

	// Kontstruktori (__construct);
	public KlasatDheObjektet() {
		// kode
	}

	public static void main(String[] args) {
		// Emir, variable, thirrje e objektits
		KlasatDheObjektet myObj = new KlasatDheObjektet(); // per ta thirrur objektin (1)
		KlasatDheObjektet2 myObj2 = new KlasatDheObjektet2(); // OBJ 2

		System.out.println("Objekit 1");
		System.out.println(myObj.x);
		System.out.println(myObj.x + " + " + myObj.y + " = " + (myObj.x + myObj.y));

		System.out.println("\nObjekit 2 ");
		System.out.println(myObj2.x);
		System.out.println(myObj2.x + " + " + myObj2.y + " = " + (myObj2.x + myObj2.y));

		System.out.println(
				"\n****************************************************************************************************************\n");

		/* Per ta rishruaj Variablen ne objekte */

		myObj.x = 10;
		System.out.println("VAR x tani eshte " + myObj.x);

		myObj.y = 30;
		System.out.println("VAR x tani eshte " + myObj.y);

//		myObj2.z = 30; //Variabla Final nuk mund te ndryshohet
		System.out.println("Varibala final nuk mund te ndryhohet");

		System.out.println(
				"\n****************************************************************************************************************\n");

		/* Metodat */
		// statike
		staticMethod();
		// voidMethod(); //Compailent error

		// Te gjitha metodat tjera duhet te thirret objekti ne fillim pastaj metodat
		myObj2.voidMethod();
		System.out.println(
				"\n****************************************************************************************************************\n");
		Cars.carName("Ferrari");
		Cars.speed(300);
		Cars.main(args);

		System.out.println(
				"\n****************************************************************************************************************\n");

		/* Konstrukteri */

		Human myObj3 = new Human("Alpet", "Gexha", 17);

		System.out.println(myObj3.human_data());
		System.out.println(myObj3.toString());

		System.out.println(
				"\n****************************************************************************************************************\n");

	}

}