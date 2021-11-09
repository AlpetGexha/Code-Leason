/*OOP- Object-oriented programming
 * është një model programimi kompjuterik që organizon krijimin e softuerit rreth të dhënave,
 * ose objekteve, në vend se funksioneve dhe logjikës.
 * Një objekt mund të përcaktohet si një fushë e të dhënave që ka atribute dhe sjellje unike.
 * 
 */
 
package OOP;

//hapet para medodes kryesore
public class Human{ //hapja e classes per OOP 
	//deklarimi i variablave
	String Emri;
	String Mbiemri;
	int Mosha;
	
	//metoda
	//thirret gjitmon me this.medotda()
	public Human(String name, String surname, int age) {
		this.Emri=name;
		this.Mbiemri = surname;
		this.Mosha = age;
	}
	
	//return vlera kthyse
	//getName(),getsurname(),getAge() funksione me vler kthyse
 	public String getName() { return this.Emri; }
	public String getsurname() { return this.Mbiemri; }
	public int getAge() { return this.Mosha; }
	
	public String human_data() { return " Ju jeni " + this.Emri + " " + this.Mbiemri + " dhe jeni " + this.Mosha + " vjet"; }
	 
	
	 public static void main(String[] args) {
		 Human alpet = new Human ("Alpet","Gexha", 16 ); //thirrja e metodes
		 System.out.println(alpet.human_data());
		 System.out.println(alpet.getName());
		 System.out.print("Alpet"); 
		 System.out.print("Albi");
		 System.out.println("alpet");
		 System.out.print("Gexha");
		 //print - Shruaj me nje rresht
		 //println - Shrujan ne rresht dhe kaperce rreshtin pasi te shfaqes shkrimin
		 
		 
		 //per te ndryshuar
		 alpet.Emri = "Alpet1";
		 System.out.println(alpet.human_data());
		 
	 } 
}