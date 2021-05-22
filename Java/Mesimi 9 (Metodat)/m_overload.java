package metodat;

public class m_overload {

	//overload eshte emir i medotes eshte i njejt po funskioni ndyshe
		
	public static int avg(int numri1 , int numri2) {	
		return (numri1 + numri2)/2;
		}

		public static double avg(double numri1 , double numri2) {
		return (numri1 + numri2)/2;
		}

		public static double avg(double numri1 , double numri2, double numri3) {	
		return (numri1 + numri2 + numri3)/3;
		}

	public static void main(String[] args) {
		
		System.out.println("Mesatarja mes numrit 4 dhe 3 eshte: " + avg(4,3  ));
		System.out.println("Mesatarja mes numrit 4.2 dhe 3.3 eshte: " + avg(4.3,3.2));
		System.out.println("Mesatarja mes numrit 4.2,3.3 dhe 2.2 eshte: " + avg(4.2,3.3,2.2));

	}

}


