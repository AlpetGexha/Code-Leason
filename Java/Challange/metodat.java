package Challange;

public class Challange7 {
	
	public static void mosha(int mosha) {
		System.out.println(mosha*365 + " dite i vjeter" );
	}
	
	public static int moshaa(int moshaa) {
		return moshaa * 365;
	}
	
	public static void temp(double temp) {
		System.out.println((5.0/9.0) * (temp - 32) + "F");
	}
	
	public static double temp2(double temp) {
		return (5.0/9.0) * (temp - 32);
	}
	
	public static boolean plot(int num) {
		if (num % 5 == 0  ) {
			  return true;
		} else {
			return false;
		}
	
	
	}
	public static void plot2(int num) {
		if( num % 5 == 0 ) {
			System.out.println(num +" eshte i plot pjestueshem");

		} else {
			System.out.println(num + " nuk eshte i plot pjestueshem");
		}
	}
	
	
	public static double mesatarja(int [] vargu) {
		int sum = 0;
	
		for(int i = 0; i < vargu.length; i++) {
			sum += vargu[i];
		}
		double length = vargu.length;
		double average = sum/length;
		
		return average;
		
	}

	
	public static void main(String[] args) {
		
		mosha(16);
		System.out.println(moshaa(16)  + " dite i vjeter");
		
		temp(132.3);
		System.out.println(temp2(132.3) + "F");
		
		plot2(13);
		plot2(15);
		System.out.println(plot(13)); 
		System.out.println(plot(15));
		
		int[] vargu = {1,2,3,4,5};
	
		System.out.println(mesatarja(vargu));
	}
}
  