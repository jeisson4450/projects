/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ManejoArbol;

import Arbol.ArbolBinario;
import static java.lang.Math.pow;

/**
 *
 * @author oscar
 */
public class Bosque {

    private static ArbolBinario tree;

    public static ArbolBinario getTree() {
        return tree;
    }

    public static void setTree(ArbolBinario tree) {
        Bosque.tree = tree;
    }

  
    

    public Bosque() {
        tree = new ArbolBinario();
        tree.crearArbol();

    }
}
