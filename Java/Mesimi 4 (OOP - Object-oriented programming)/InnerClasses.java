package OOP;

/*
 * 
 * Në Java, është gjithashtu e mundur të vendosen klasa (një klasë brenda një klase). Qëllimi i klasave të mbivendosura është të grupojë klasat që i përkasin së bashku, gjë që e bën kodin tuaj më të lexueshëm dhe të mirëmbajtur.
 * 
 * */

class MainClass {
	int x = 10;

	class MainInnerClass {
		int y = 5;
		public int sum(int x) {
			return x + 4;
		}
	}
}

public class InnerClasses {
	public static void main(String[] args) {
		MainClass myOuter = new MainClass();
		MainClass.MainInnerClass myInner = myOuter.new MainInnerClass(); //Thirrja e inner klases
		System.out.println(myInner.y + myOuter.x);
		System.out.println(myInner.sum(5)); //thirrja e funsionit

	}
}
