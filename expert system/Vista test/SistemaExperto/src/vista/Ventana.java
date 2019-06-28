/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package vista;

import java.awt.Color;
import java.awt.Font;
import javax.swing.JFrame;
import javax.swing.JLabel;

/**
 *
 * @author usuario
 * 
 */
public class Ventana extends JFrame {
    ImagenFondo principal;
    JLabel Titulo;
    
    public Ventana ()
    {
        this.setVisible(true); 
        
        this.addPrincipal();
        this.creaTitulo();
        this.setBounds(250, 100, principal.horizontal(), principal.vertical());
        this.setDefaultCloseOperation(EXIT_ON_CLOSE);
        
        
    }
    private void creaTitulo()
    {
        Titulo = new Texto("ANIMALEITOR");
        Titulo.setBounds(400,300,700,500);
        principal.add(Titulo);
    }
     private void addPrincipal() {
        principal = new ImagenFondo();
        principal.setImage("/imagenes/imagen.jpg");
        this.add(principal);
        
     }
    
}
