package OOP;

/*
 * Në Java, është e mundur të trashëgohen atributet dhe metodat nga një klasë në tjetrën. Ne e grupojmë "inheritance concept" në dy kategori:

	subclass  (child) - klasa që trashëgon nga një klasë tjetër
	superclass (parent) - klasa nga e cila është trashëguar

Për të trashëguar nga një klasë, përdorni fjalën "extends"
 * */
class Computer {
	protected String computer = "Dell";

	protected void myComputer() {
		System.out.println("Workstation");
	}
}

public class Inheritance extends Computer {
	private String modalConputer = "HP";

	public static void main(String[] args) {
		Inheritance Computer = new Inheritance();

		Computer.myComputer(); // thirrja e metodes ne Computer

		// Vleata e atributit nga Computer dhe Inheritance
		System.out.println("Kompjuteri im është: " + Computer.computer + " ndërsa i shkollës " + Computer.modalConputer);

	}

}