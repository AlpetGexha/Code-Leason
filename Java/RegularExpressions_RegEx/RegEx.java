package RegularExpressions_RegEx;

import java.util.regex.*; //importi 

/*\
 * është një sekuencë karakteresh që formon një model kërkimi. Kur kërkoni për të dhëna në një tekst, mund ta përdorni këtë model kërkimi për të përshkruar atë që po kërkoni.
 * 
 *  mund të jetë një karakter i vetëm, ose një model më i ndërlikuar.
 *  
 * Pattern Klasa - Përcakton një model (për t'u përdorur në një kërkim)
 * Matcher Klasa - Përdoret për të kërkuar modelin
 * PatternSyntaxException Klasa - Tregon gabim sintaksor në një model shprehjeje të rregullt
 * */
public class RegEx {

	public static void main(String[] args) {
		Pattern pattern = Pattern.compile("alpetg2004G17", Pattern.CASE_INSENSITIVE);
		Matcher matcher = pattern.matcher("Emri: AlpetG2004G17");
		boolean matchFound = matcher.find();
		if (matchFound)
			System.out.println("Teksti përputhet");
		else
			System.out.println("Teksti nuk përputhet");

		
		/*
		 * Parametri i parë (" Pattern.compile() " )tregon se cili model është duke u
		 * kërkuar dhe parametri i dytë ka një flamur për të treguar se kërkimi duhet të
		 * jetë i pandjeshëm ndaj shkronjave të vogla. Parametri i dytë është opsional.
		 * 
		 * matcher()Metodë përdoret për të gjetur modelin në një varg. Ai kthen një
		 * objekt Matcher i cili përmban informacion në lidhje me kërkimin që është
		 * kryer.
		 * 
		 * 
		 * find()Metoda Kthen TRUE nëse model u gjet në varg dhe të rreme, nëse ajo nuk
		 * është gjetur.sF
		 * 
		 * 
		 * 
		 * 
		 * 
		 * Pattern.CASE_INSENSITIVE - Rasti i shkronjave do të injorohet gjatë kryerjes
		 * së një kërkimi. Pattern.LITERAL - Karakteret speciale në model nuk do të kenë
		 * ndonjë kuptim të veçantë dhe do të trajtohen si karaktere të zakonshme gjatë
		 * kryerjes së një kërkimi. Pattern.UNICODE_CASE- Përdoreni atë së bashku me
		 * CASE_INSENSITIVEflamurin për të injoruar edhe rastin e shkronjave jashtë
		 * alfabetit anglez
		 */
		
		String str = "Alpetgexha";
		String redax = "[0-9]";
		Pattern p = Pattern.compile(redax);
		Matcher m = p.matcher(str);
		boolean match1 = m.find();
		if (match1)
			System.out.println("Teksti përputhet");
		else
			System.out.println("Teksti nuk përputhet");
		/*Mathcher*/
		/*
		* 
		* 	|	Find a match for any one of the patterns separated by | as in: cat|dog|fish
		*	.	Find just one instance of any character
		*	^	Finds a match as the beginsning of a string as in: ^Hello
		*	$	Finds a match at the end of the string as in: World$
		*	\d	Find a digit
		*	\s	Find a whitespace character
		*	\b	Find a match at the beginning of a word like this: \bWORD, or at the end of a word like this: WORD\b
		*
		* */

	}

}
