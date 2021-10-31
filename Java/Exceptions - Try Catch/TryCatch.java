package Exception;

// try - ju lejon për të përcaktuar një bllok i kodit të testuar për gabime, ndërsa ajo është duke u ekzekutuar.
// catch - ju lejon për të përcaktuar një bllok i kodit për t'u ekzekutuar, nëse ndodh një gabim në bllokun e provoni

// try e kap  gabimin catch e trgon gabimin

public class TryCatch {
	/*
	 * throwDeklarata ju lejon të krijoni një gabim porosi.
	 * 
	 * throwDeklarata është përdorur së bashku me një lloj përjashtim . Ka shumë
	 * lloje përjashtimesh të disponueshme në Java: ArithmeticException,
	 * FileNotFoundException, ArrayIndexOutOfBoundsException, SecurityException,
	 * 
	 */
	static void checkAge(int age) {
		try {
			if (age < 18) {
				throw new ArithmeticException("Access denied - You must be at least 18 years old.");
			} else {
				System.out.println("Access granted - You are old enough!");
			}
		} catch (Exception e) {
			System.out.println(e);
		}
	}

	public static void main(String[] args) {
		checkAge(2); // Set age to 15 (which is below 18...)

		try

		{
			int[] myNumbers = { 1, 2, 3 };
			System.out.println(myNumbers[10]);
		} catch (Exception e) {
			System.out.println("Dicka shkoj keq.");
		}

		/*
		 * finally lejon të ekzekutojë kodin, pasi try...catch, pavarësisht nga *
		 * rezultati
		 */
		try {
			int[] myNumbers = { 1, 2, 3 };
			System.out.println(myNumbers[1]);
		} catch (Exception e) {
			System.out.println("Dicka shkoj keq.");
		} finally {
			System.out.println(" 'try catch'Nbaroi.");
		}
	}
}
