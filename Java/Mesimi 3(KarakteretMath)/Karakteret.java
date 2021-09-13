package KarakteretMath3;

public class Karakteret {

	public static void main(String[] args) {
		
        String fjala = "Sot eshte dita e merkure"; String 
        fjala2 ="   Lorem ipsum dolor sit amet, consectetur adipiscing elit,   ada     ";
        
        System.out.println("Gjatesia e fjales eshte: " + fjala.length()); 
        System.out.println(fjala.toUpperCase()); //te gjita karakteret i ben te medha
        System.out.println(fjala.toLowerCase());//te gjita karakteret i ben te vogla
        System.out.println(fjala.indexOf("dita"));//gjen se ku e ka indexin(0-...) fjain e then
        System.out.println(fjala.charAt(13));// gjen se cfare indexi ne fjali edhe numri i thene
        System.out.println(fjala2); 
        System.out.println(fjala2.trim());//heq te gjitha haperiar e teperta ne nje fjali
        System.out.println("\n");
        
        
        
        
        String text1 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,";
        String text2 = "LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELiT,";
        
        System.out.println("Krahasimi ne mes tekstit: " + text1.equals(text2));//krahason tekstin a eshte i njejt cdo shronj duhet te njete e njet
        System.out.println("Krahasimi ne mes tekstit: " + text1.toUpperCase().equals(text2.toUpperCase())); // e ben tekin e njet(me shronja te medha) dhe e krahason
        System.out.println("\n");

               
        System.out.println("It's a goot day");
        System.out.println("\"Shkolla Digjitale\""); // "\" tregon qe duhet te lehohet nja e thëne, Lejon te gjitha simbolet,karakteret qe shruhen pas "\"
        System.out.println("More 95 \\ 100 pike");// shenja \
        System.out.println("Digjital \n School");// \n rresht i ri
        System.out.println("Digjital \t School");// \t shtyn tektin per një tab    
        
        
        /*
        final double numri = 3.14; // vlera konstante
        
        numripi = 4; // error sepse vlera konstanet nuk mund te ndryshohet
        
        System.out.println(numripi);
        */
	}

}
