/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Arbol;

import static java.lang.Math.*;
import java.util.ArrayList;
import java.util.Scanner;

/**
 *
 * @author Fredy Vanegas
 */
public class ArbolBinario {

//    public static void main(String[] ar) {
//        ArbolBinario abo = new ArbolBinario();
//        long centroArbol = (long) pow(2, 12);
//        abo.insertar(centroArbol);
////        abo.recorrer();
////        abo.insertar(50);
////        abo.insertar(25);
////        abo.insertar(75);
////        abo.insertar(150);
////        System.out.println("Impresion preorden: ");
////        abo.imprimirPre();
////        System.out.println("Impresion entreorden: ");
////        abo.imprimirEntre();
////        System.out.println("Impresion postorden: ");
////        abo.imprimirPost();
//        int nn = 0, i = 0;
//        long idNew = 0;
//        String ss = "";
//        Scanner sc = new Scanner(System.in);
//        while (sc.hasNext()) {
////            nn = sc.nextInt();
//            ss = sc.next();
//            idNew = abo.insertarString(ss);
//            abo.insertar(idNew);
//            i++;
//            if (i == 10) {
//                System.out.println("Impresion preorden: ");
//                abo.imprimirPre();
//                System.out.println("Impresion entreorden: ");
//                abo.imprimirEntre();
//                System.out.println("Impresion postorden: ");
//                abo.imprimirPost();
//                i = 0;
//                abo.imprimirCamino2();
//            }
//        }
//        
////        System.out.println("Impresion preorden: ");
////        abo.imprimirPre();
////        System.out.println("Impresion entreorden: ");
////        abo.imprimirEntre();
////        System.out.println("Impresion postorden: ");
////        abo.imprimirPost();
//    }
    Nodo raiz, actual;
    long idActual;
    public ArrayList<Long> camino;

    public void reiniciar(){
        actual=null;
        idActual=0;
        camino.clear();
    }
    public ArrayList<Long> getCamino() {
        return camino;
    }

    public void setCamino(ArrayList<Long> camino) {
        this.camino = camino;
    }

        
    public void crearArbol() {
        long num = (long) pow(2, 12);
        idActual = num;
        insertar(num);
//        insertar((long) pow(2, 13));
//        insertar(num);
//        insertar(num);
//        insertar(num);
//        insertar(num);
//        for (int i = 0; i < 25; i++) {
//            System.out.print(" " + (long) pow(2, i));
//        }

    }

    class Nodo {

        long id = -1;
        Nodo izq, der, padre;
    }

    private void imprimirCamino() {
        for (int j = 0; j < camino.size(); j++) {
            System.out.print(camino.get(j) + " ");
        }
    }

    public void imprimirCamino2() {
        imprimirCamino();
        System.out.println();
    }
    public String imprimirCaminoBD() {
        String ruta="";
        for (int j = 0; j < camino.size()-1; j++) {
            ruta+=camino.get(j)+", ";
        }
        ruta+=camino.get(camino.size()-1);
        return ruta;
    }

    public ArbolBinario() {
        raiz = null;
        actual = null;
    }

    public void insertar(long id) { //organiza los nodos segÃºn su id
        recorrer();
        Nodo nuevo = new Nodo();
        nuevo.id = id;
        nuevo.izq = null;
        nuevo.der = null;
        nuevo.padre = null;
        if (raiz == null) {
            raiz = nuevo;
            camino = new ArrayList<>();
            camino.add(id);
        } else {
            Nodo anterior = null, reco;
            reco = raiz;
            while (reco != null) {
                anterior = reco;
                if (id < reco.id) {
                    reco = reco.izq;
                } else {
                    reco = reco.der;
                }
            }
            if (id < anterior.id) {
                anterior.izq = nuevo;
            } else {
                anterior.der = nuevo;
            }
            nuevo.padre = anterior;
        }
        System.out.println("ID=" + nuevo.id);
        imprimirEntre();
//        idActual = id;
    }

    public void recorrer() { //posiciona el nodo actual en la raiz
        if (actual == null) {
            actual = raiz;
        } else {
            Nodo anterior = null, reco;
            reco = raiz;
            while (reco != null) {
                anterior = reco;
                if (idActual < reco.id) {
                    reco = reco.izq;
                } else if (idActual > reco.id) {
                    reco = reco.der;
                } else {
                    reco = null;
                }
            }
            actual = anterior;
        }
    }

    public void recorrerInsert(long id) { //posiciona el nodo actual en la raiz
        if (actual == null) {
            actual = raiz;
        } else {
            Nodo anterior = null, reco;
            reco = raiz;
            while (reco != null) {
                anterior = reco;
                if (id < reco.id) {
                    reco = reco.izq;
                } else if (id > reco.id) {
                    reco = reco.der;
                } else {
                    reco = null;
                }
            }
            actual = anterior;
            insertar(actual.id);
        }
    }

    public long insertarString(String respuesta) { //recorre los nodos segÃºn la respuesta del usuario (V - F)
        long idNuevo = 0, idAct, idPadre;
        recorrer();
        if (actual != null) {
            if (actual.padre != null) {
                idPadre = actual.padre.id;
            } else {
                idPadre = 0;
            }
            idAct = actual.id;
        } else {
            idAct = 0;
            idPadre = 0;
            if (respuesta.equalsIgnoreCase("F")) {
                idNuevo = (actual.id) / 2;
            }
            if (respuesta.equalsIgnoreCase("V")) {
                idNuevo = (actual.id) * 3 / 2;
            }
        }
        if (idNuevo == 0) {
            if (respuesta.equalsIgnoreCase("F")) {
                idNuevo = abs(idAct - abs((idAct - idPadre) / 2));
            } else if (respuesta.equalsIgnoreCase("V")) {
                idNuevo = abs(idAct + abs((idAct - idPadre) / 2));
            }
        }
        camino.add(idNuevo);
        idActual = idNuevo;
        insertar(idNuevo); // ojo
        return idNuevo;
    }

    public long getraiz() {
        // throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
        return raiz.id;
    }

    public long recorrerString(String respuesta) { //recorre los nodos segÃºn la respuesta del usuario (V - F)
        long idNuevo = 0, idAct, idPadre;
        Nodo reco = null;
//        recorrer();
        if (actual != null) {
            if (actual.padre != null) {
                idPadre = actual.padre.id;
            } else {
                idPadre = 0;
            }
            idAct = actual.id;
        } else {
            actual = raiz;
            idAct = 0;
            idPadre = 0;
            if (respuesta.equalsIgnoreCase("F")) {
//                idNuevo = (actual.id) / 2;
                idNuevo = actual.izq.id;
                reco = actual.izq;
            }
            if (respuesta.equalsIgnoreCase("V")) {
//                idNuevo = (actual.id) * 3 / 2;
                idNuevo = actual.der.id;
                reco = actual.der;
            }
        }
        if (idNuevo == 0) {
            if (respuesta.equalsIgnoreCase("F")) {
//                idNuevo = abs(idAct - abs((idAct - idPadre) / 2));
                idNuevo = actual.izq.id;
                reco = actual.izq;
            } else if (respuesta.equalsIgnoreCase("V")) {
//                idNuevo = abs(idAct + abs((idAct - idPadre) / 2));
                idNuevo = actual.der.id;
                reco = actual.der;
            }
        }
        camino.add(idNuevo);
        idActual = idNuevo;
        actual = reco;
        return idNuevo;
    }

    private void imprimirPre(Nodo reco) {
        if (reco != null) {
            System.out.print(reco.id + " ");
            imprimirPre(reco.izq);
            imprimirPre(reco.der);
        }
    }

    public void imprimirPre() {
        imprimirPre(raiz);
        System.out.println();
    }

    private void imprimirEntre(Nodo reco) {
        if (reco != null) {
            imprimirEntre(reco.izq);
            System.out.print(reco.id + " ");
            imprimirEntre(reco.der);
        }
    }

    public void imprimirEntre() {
        imprimirEntre(raiz);
        System.out.println();
    }

    private void imprimirPost(Nodo reco) {
        if (reco != null) {
            imprimirPost(reco.izq);
            imprimirPost(reco.der);
            System.out.print(reco.id + " ");
        }
    }

    public void imprimirPost() {
        imprimirPost(raiz);
        System.out.println();
    }
}
