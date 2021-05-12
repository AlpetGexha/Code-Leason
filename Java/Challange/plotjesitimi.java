package Challage;

public class plotjesitimi {
	public static void main (String[] args) {
		int number = 7;
		
		if((number % 2 == 0) && (number % 3 == 0)) {System.out.println("numri "+ number +" plotpjestohet me 2 dhe 3");}
		if((number % 2 == 0) || (number % 3 == 0)) {System.out.println("numri "+ number +" plotpjesothet me 2 ose 3");}
		if((number % 2 == 0) ^ (number % 3 == 0)) {System.out.println("numri "+ number + " plotpjstohet me 2 ose 3 po jo me te 2t");}
		else System.out.println("Numri nuk plotepjesetohet as me 2 as me 3");

	}
}
