package Challage;

public class array_RandmonNumber {
	public static void main(String[] args) {
		double[] random = new double[10];
		
		for(int i= 0; i < random.length; i++) {
			random[i] = Math.random()*100;
			
			
		}
		for (int a= 0; a < random.length; a++) {
			System.out.println(random[a]);
			}
		}
}
