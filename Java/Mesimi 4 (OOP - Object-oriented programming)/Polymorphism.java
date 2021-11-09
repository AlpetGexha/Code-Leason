package OOP;

/*
 * Polimorfizëm do të thotë "Many Form", dhe ndodh kur kemi shumë klasa që janë të lidhura me njëra-tjetrën sipas trashëgimisë.
 * 	Inheritance na lejon të trashëgojmë atribute dhe metoda nga një klasë tjetër. Polimorfizmi përdor ato metoda për të kryer detyra të ndryshme. Kjo na lejon të kryejmë një veprim të vetëm në mënyra të ndryshme.
 * 
 * */
class Animal {
	public void animalSound() {
		System.out.println("The animal makes a sound");
	}
}

class Pig extends Animal {
	public void animalSound() {
		System.out.println("The pig says: wee wee");
	}
}

class Dog extends Animal {
	public void animalSound() {
		System.out.println("The dog says: bow wow");
	}
}

/*
 * Tani mund të krijojmë Pigdhe Dogobjekte dhe të thërrasim animalSound()metodën
 * në të dyja:
 */
class Polymorphism {
	public static void main(String[] args) {
		Animal myAnimal = new Animal();
		Animal myPig = new Pig();
		Animal myDog = new Dog();
		myAnimal.animalSound();
		myPig.animalSound();
		myDog.animalSound();
	}
}