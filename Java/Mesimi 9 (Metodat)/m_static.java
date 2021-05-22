package metodat;

public class m_static {
	//duhet te kthen vetem me return
	
	  public static int cal_sum(int start, int end) {
		 int sum = 0;
		 
		 for(int i = start; i <= end; i++) {
			 sum+=i;
		 }
		 return sum;
	  }
	
	public static void main (String[] args) {
		
		//pa funkion 
		
//		int sum = 0;
//		
//		for(int i = 1; i<11; i++ ) {
//			sum+=i;
//		}
//		System.out.println(sum);
//		
//		sum = 0;
//		for(int i = 10; i<=20; i++ ) {
//			sum+=i;
//		}
//		System.out.println(sum);
//		
//		sum = 0;
//		for(int i = 20; i<=30; i++ ) {
//			sum+=i;
//		}
//		System.out.println(sum);
		
		
		//me funkion 
		System.out.println("Shum në mes 1-10 eshte: " + cal_sum(1,10));
		System.out.println("Shum në mes 10-20 eshte: " + cal_sum(10,20));
		System.out.println("Shum në mes 20-30 eshte: " + cal_sum(20,30));	
		
	}
}
