/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Iniciar;

import ManejoArbol.Bosque;
import Vista.Ventana;


/**
 *
 * @author usuario
 */
public class Animalauncher {
    
    public static void main(String[] args) {
       Bosque trunk = new Bosque();
       Ventana ventana = new Ventana();
    }
}


/*
public static void main(String[] ar) {
        ArbolBinario abo = new ArbolBinario();
        
        abo.insertar(centroArbol);
//        abo.recorrer();
//        abo.insertar(50);
//        abo.insertar(25);
//        abo.insertar(75);
//        abo.insertar(150);
//        System.out.println("Impresion preorden: ");
//        abo.imprimirPre();
//        System.out.println("Impresion entreorden: ");
//        abo.imprimirEntre();
//        System.out.println("Impresion postorden: ");
//        abo.imprimirPost();
        int nn = 0, i = 0;
        long idNew = 0;
        String ss = "";
        Scanner sc = new Scanner(System.in);
        while (sc.hasNext()) {
//            nn = sc.nextInt();
            ss = sc.next();
            idNew = abo.insertarString(ss);
            abo.insertar(idNew);
            i++;
            if (i == 10) {
                System.out.println("Impresion preorden: ");
                abo.imprimirPre();
                System.out.println("Impresion entreorden: ");
                abo.imprimirEntre();
                System.out.println("Impresion postorden: ");
                abo.imprimirPost();
                i = 0;
                abo.imprimirCamino2();
            }
        }
        
//        System.out.println("Impresion preorden: ");
//        abo.imprimirPre();
//        System.out.println("Impresion entreorden: ");
//        abo.imprimirEntre();
//        System.out.println("Impresion postorden: ");
//        abo.imprimirPost();
    }
*/