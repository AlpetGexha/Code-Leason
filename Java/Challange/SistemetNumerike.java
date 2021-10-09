package Challange;

import java.util.Scanner;

public class SistemetNumerike {
    public static void shfaqOpsionet() {

        System.out.println("\n>\n>\n>\n>\n");

        System.out.println("Shtyp 1 për numra binar");
        System.out.println("Shtyp 2 për numra oktal");
        System.out.println("Shtyp 3 për numra decimal");
        System.out.println("Shtyp 4 për numra hexadecimal");
        System.out.println("Shtyp 0 për të perfunduar Aplikacionin");

        System.out.println("\n>\n>\n>\n>\n");

    }

    public static void decimalToBinar(int decimal) {
        int binary[] = new int[1000];
        int index = 0;

        while (decimal > 0) {

            binary[index++] = decimal % 2;
            decimal = decimal / 2;
        }
        for (int i = index - 1; i >= 0; i--) {
            System.out.print(binary[i]);
        }

        System.out.print(" (Binar)2 \n");
    }

    public static void decimalToHexadecimal(int decimal) {
        int index;
        String hex = "";
        char hexchars[] = { '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F' };
        while (decimal > 0) {
            index = decimal % 16;
            hex = hexchars[index] + hex;
            decimal = decimal / 16;
        }
        System.out.print(hex + " (Hexadecimal)16 \n");
    }

    public static void decimalToOktal(int decimal) {
        int oktal[] = new int[10000];
        int indexOktal = 0;
        while (decimal > 0) {
            oktal[indexOktal++] = decimal % 8;
            decimal = decimal / 8;
        }
        for (int i = indexOktal - 1; i >= 0; i--) {
            System.out.print(oktal[i]);
        }
        System.out.print(" (Oktal)8 \n");
    }

    public static int binarToDecimal(String binar) {

        int decimal = Integer.parseInt(binar, 2);
        System.out.print(decimal + " (Decimal)10 \n");
        return decimal;

    }

    public static void binarToOktal(String binar) {

        int num = Integer.parseInt(binar, 2);
        String oktal = Integer.toOctalString(num);
        System.out.print(oktal + " (Oktal)8 \n");

    }

    public static void binarToHexadecimal(String binar) {
        String hexadecimal = "";
        char[] hexchars = { '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F' };

        int decimal = binarToDecimal(binar);
        while (decimal > 0) {

            hexadecimal = hexchars[decimal % 16] + hexadecimal;
            decimal /= 16;
        }

        System.out.println(hexadecimal + " (Hexadecimal)16 \n");

    }

    public static void oktalToBinar(int oktal) {
        int[] oktalChar = { 0, 1, 10, 11, 100, 101, 110, 111 };
        long binarNum, place;
        int index;

        binarNum = 0;
        place = 1;
        while (oktal != 0) {
            index = (int) (oktal % 10);
            binarNum = oktalChar[index] * place + binarNum;
            oktal /= 10;
            place *= 1000;
        }
        System.out.print(binarNum + " (Binar)2 \n");
    }

    public static int octalToDecimal(int oktal) {

        int base = 1;
        int index = 0;

        while (oktal > 0) {

            int oktalSum = oktal % 10;
            oktal = oktal / 10;

            index += oktalSum * base;

            base = base * 8;
        }
        return index;

    }

    public static void oktalToHexadecimal(int oktal) {
        String hexadecimal = "";
        char[] hexchars = { '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F' };

        int decimal = octalToDecimal(oktal);
        while (decimal > 0) {

            hexadecimal = hexchars[decimal % 16] + hexadecimal;
            decimal /= 16;
        }

        System.out.println(hexadecimal + " (Hexadecimal)16 \n");

    }

    public static int hexadecimalToDeciaml(String hex) {

        int num = Integer.parseInt(hex, 16);

        return num;

    }

    public static void hexadecimalToBinar(String hex) {

        long longs = Long.parseLong(hex, 16);
        String binary = Long.toBinaryString(longs);

        System.out.print(binary + " (Binar)2 \n");

    }

    public static void hexadecimalToOktal(String hex) {

        int decimalNumber, index = 1, i;
        int[] octalNumber = new int[100];

        decimalNumber = hexadecimalToDeciaml(hex);
        while (decimalNumber > 0) {
            octalNumber[index++] = decimalNumber % 8;
            decimalNumber = decimalNumber / 8;
        }
        for (i = index - 1; i > 0; i--) {
            System.out.print(octalNumber[i]);
        }

        System.out.print(" (Oktal)8 \n");
        // long decimalNumber = Long.parseLong(hex, 8);
        // String num = Long.toHexString(decimalNumber);
        // System.out.print(num + " Oktal \n");
    }

    public static void main(String[] args) {

        Scanner s = new Scanner(System.in);
        System.out.println("> Aplikacioni për Sistemin e Numrave");
        shfaqOpsionet();
        int choise;
        while ((choise = s.nextInt()) > 0) {
            if (choise == 1) {

                System.out.print("Shruani Numrin Binar: ");
                String binar = s.next().replaceAll("\\s+","");

//                binarToDecimal(binar);
                binarToOktal(binar);
                binarToHexadecimal(binar);

            } else if (choise == 2) {
                System.out.print("Shruani Numrin Oktal: ");
                int oktal = s.nextInt();
                oktalToBinar(oktal);
                System.out.print(octalToDecimal(oktal) + " (Decimal)10 \n");
                oktalToHexadecimal(oktal);

            } else if (choise == 3) {
                System.out.print("Shruani Numrin Decimal: ");
                int decimal = s.nextInt();
                decimalToBinar(decimal);
                decimalToOktal(decimal);
                decimalToHexadecimal(decimal);
            } else if (choise == 4) {
                // hexadecimal
                System.out.print("Shruani numrin Hexadeximla: ");
                String hexa = s.next().toUpperCase().replaceAll("\\s+","");
                hexadecimalToBinar(hexa);
                hexadecimalToOktal(hexa);
                System.out.println(hexadecimalToDeciaml(hexa) + " (Decimal)10 \n");

            }

            System.out.println("\n>\n>\n>\n>\n");
            System.out.println("> Për të vazhduar shtypeni numrin pesë (5)");

            if (s.nextInt() == 5)
                shfaqOpsionet();
            else
                break;
        }

        s.close();

        {
            System.out.println("> Aplikacioni përfundoi");
            System.exit(1);
        }
        // char = choise;
        // do {
        // System.out.print("Shkruani numrin Decimal: ");
        // shfaqOpsionet();
        // int num = s.nextInt();
        //
        // toBinary(num);
        // System.out.print("Shypni x pėr tė vazhduar: ");
        // choise = s.next().charAt(0);
        // } while (choise == 'x' || choise == 'X');
    }
}
