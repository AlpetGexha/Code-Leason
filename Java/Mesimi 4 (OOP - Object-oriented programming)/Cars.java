package OOP;

public class Cars {

	static void carName(String name) {
		System.out.println("Emri i makines: " + name);
	}

	public void fullThrottle() {
		System.out.println("Makina po ecën aq shpejt sa mundet!");
	}

	public static void speed(int maxSpeed) {
		System.out.println("Max speed is: " + maxSpeed);
	}

	public static void main(String[] args) {
		Cars myCar = new Cars();
		carName("BMW M5 E39.");
		myCar.fullThrottle();
		Cars.speed(190);
	}
}