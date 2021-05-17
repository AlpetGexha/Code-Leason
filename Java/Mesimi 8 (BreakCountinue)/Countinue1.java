package BreakCountinue;

public class Countinue1 {

	public static void main(String[] args) {
		//continue tejkalo dhe vazdho funsionin
		for(int i = 0; i<10; i++) {
			if(i == 4) { continue; } //kur numri shkon deri ne 3 telkalo dhe vazhdo funksionin
			System.out.print(i); 
			
			//nese numir nuk eshe = 9 ndalo presjen
			if(i!=9) {
				System.out.print(",");
			}
			
		}	

	}

}
