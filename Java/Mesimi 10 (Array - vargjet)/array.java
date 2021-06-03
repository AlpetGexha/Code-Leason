package array;

public class array {
	public static void main(String[] args) {
		
		//hapje e vargut
		 String[] prgramming = {"Java", "PHP", "GO", "JavaScript" };
		 int [] notat = {3,4,5,4,5,4,3};
		 double[] doubletest = {1.3,1.3,4.3,13.3};
		 
		 //thirrja e tyre
		 System.out.println(prgramming[1]);
		 System.out.println(notat[3]);
		 System.out.println(doubletest[0]);
		 
		 //reshkrimi i vargut te caktuar
		 prgramming[1] = "python";
		 System.out.println(prgramming[1]);
		 
		 //gjatesia e vargut
		 int arraylengh = notat.length;
		 System.out.println("Gjatesia e vargut eshte: " + arraylengh);
		 
		 //krijumi i vargut i object
		 int[] number = new int[10];
		 
		 number[0] = 1;
		 number[1] = 2;
		 number[9] = 4;
		 
		 System.out.println(number[9]);
		 	 
		 
	}
}
