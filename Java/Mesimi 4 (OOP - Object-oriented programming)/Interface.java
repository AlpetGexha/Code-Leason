package OOP;
/*
 * 
 * interface është  një "abstract class" plotësisht që përdoret për të grupuar metoda të lidhura me trupa bosh:
 * 
 * Për të hyrë në metodat e ndërfaqes, ndërfaqja duhet të "implemented" (siç është trashëguar) nga një klasë tjetër me fjalën implements kyçe (në vend të extends). 
 * Trupi i metodës së ndërfaqes sigurohet nga klasa "implement":
 * 
 * */

//interface
interface Animal {
	public void animalSound(); // interface method (does not have a body)

	public void sleep(); // interface method (does not have a body)
}

interface Mouse {
	public void myMouse(); // interface method
}

interface Keyboard {
	public void myKeboard(); // interface method
}

//Multi Interface
class Sets implements Mouse, Keyboard {
	public void myMouse() {
		System.out.println("GXT 131 Ranoo Wireless Gaming Mouse");
	}

	public void myKeboard() {
		System.out.println("HyperX Alloy Origins 60 Mechanical Gaming Keyboard");
	}
}

//Pig "implements" the Animal interface
class Pig implements Animal {
	public void animalSound() {
		// The body of animalSound() is provided here
		System.out.println("The pig says: wee wee");
	}

	public void sleep() {
		// The body of sleep() is provided here
		System.out.println("Zzz");
	}
}

class Intercar { // (Main)
	public static void main(String[] args) {
		Pig myPig = new Pig(); // Create a Pig object
		myPig.animalSound();
		myPig.sleep();
		Sets mySet = new Sets();
		mySet.myMouse();
		mySet.myKeboard();

	}
	
	
	/*
	 * Ashtu si klasat abstrakte , ndërfaqet nuk mund të përdoren për të krijuar objekte (në shembullin e mësipërm, nuk është e mundur të krijohet një objekt "Animal" në MyMainClass)
	 * 
	 * Metodat e ndërfaqes nuk kanë një trup - trupi sigurohet nga klasa "implement".
	 * 
	 * Në zbatimin e një ndërfaqeje, duhet të anashkaloni të gjitha metodat e saj
	 * 
	 * Metodat e ndërfaqes janë si parazgjedhje abstractdhe public
	 *
	 * Atributet Interface janë nga default public, staticdhefinal
	 *
	 * Një ndërfaqe nuk mund të përmbajë një konstruktor (pasi nuk mund të përdoret për të krijuar objekte

	 * *
	/*
	 * 
	 * Pse dhe kur të përdorni ndërfaqet?
			1) Për të arritur sigurinë - fshihni disa detaje dhe tregoni vetëm detajet e rëndësishme të një objekti (ndërfaqes).

			2) Java nuk mbështet "trashëgiminë e shumëfishtë" (një klasë mund të trashëgojë vetëm nga një superklasë). Megjithatë, mund të arrihet me ndërfaqe, sepse klasa mund të implementojë ndërfaqe të shumta. Shënim: Për të implementuar ndërfaqe të shumta, ndajini ato me presje (shih shembullin më poshtë)

	 * */
}
