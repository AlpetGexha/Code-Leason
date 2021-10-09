package Challange;

public class piramida {

  public static void getPiramidNelt(int x) {
    for (int i = 1; i <= x; i++) {
      for (int j = 1; j < i; j++) {
        System.out.print("* ");
      }
      System.out.println("");
    }
  }

  public static void getPiramidPosht(int x) {
    for (int i = x; i >= 1; i--) {
      for (int j = 1; j <= i; j++) {
        System.out.print("* ");
      }
      System.out.println("");
    }
  }

  public static void getPiramidPosht2(int x) {
    int i, j;
    for (i = 0; i <= x; i++) {
      for (j = 3 * (x - 1); j >= 0; j--) {
        System.out.print(" ");
      }

      for (j = 0; j <= i; j++) {
        System.out.print("* ");
      }
      System.out.println("");
    }
  }

  public static void getTriangelPosht(int x) {
    for (int i = 0; i < x; i++) {
      for (int j = x - i; j > 1; j--) {
        System.out.print(" ");
      }

      for (int j = 0; j < i; j++) {
        System.out.print("* ");
      }
      System.out.println("");
    }
  }

  public static void getTriangelNelt(int x) {
    for (int i = 1; i <= x; i++) {
      for (int j = 1; j < i; j++) {
        System.out.print(" ");
      }
      for (int j = i; j <= x; j++) {
        System.out.print("* ");
      }
      System.out.println("");
    }
  }

  public static void main(String[] args) {
    getPiramidNelt(10);
    getPiramidPosht(10);
    getTriangelPosht(10);
    getTriangelNelt(9);
    //		getPiramidPosht2(10);

  }
}
