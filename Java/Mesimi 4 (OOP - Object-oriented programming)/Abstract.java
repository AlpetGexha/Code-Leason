package OOP;

/*
 *	Data abstraction është procesi i fshehjes së disa detajeve dhe shfaqjes së përdoruesit vetëm të informacionit thelbësor.
 *	Abstraksioni mund të arrihet ose me abstract classes  ose me Interface 
 * 
 * 
 * 	Fjala abstract  është një modifikues pa akses, i përdorur për klasa dhe metoda:
 * 
 * 
 * Abstract class: është një klasë e kufizuar që nuk mund të përdoret për të krijuar objekte (për të hyrë në të, duhet të trashëgohet nga një klasë tjetër).
 * 
 * Abstract method: mund të përdoret vetëm në një klasë abstrakte, dhe ajo nuk ka një trup. Trupi sigurohet nga nënklasa (e trashëguar nga).
 * 
 * */

//Klasat Absatcte
abstract class Computer {

	public abstract void computerStats();

// Regular method
	public void computerShutDown() {
		System.out.println("Alt+f4");
	}
}

//Subclass (inherit nga Animal)
class GPU extends Computer {
	public void computerStats() {
		// The body of computerStats() is provided here
		System.out.println("GTX 3090");
	}
}

class Abstract {// (Main)
	public static void main(String[] args) {
//		Computer obj = new Computer(); //Error sepse për të hyrë në klasën abstrakte, ajo duhet të trashëgohet nga një klasë tjetër
		GPU myPig = new GPU(); // Create a GPU object
		myPig.computerStats();
		myPig.computerShutDown();
	}
}
