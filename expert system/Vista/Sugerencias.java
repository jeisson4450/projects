/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Vista;

import java.awt.Color;
import java.awt.Dimension;
import java.awt.Font;
import java.awt.GridLayout;
import javax.swing.BorderFactory;
import javax.swing.Box;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JTextArea;
import javax.swing.JTextField;
import static javax.swing.SwingConstants.CENTER;

/**
 *
 * @author usuario
 */
public class Sugerencias extends ImagenFondo {
    //private ImagenFondo fondo;
    private JTextField  animal;
    private JTextField descripcion;
    private Texto pregunta1;
    private JTextArea pregunta2;
    private String s1 = "¿En que animal estabas pensando?",s2="¿Que diferencia hay entre tu animal y el que te dije?";
    
    public Sugerencias()
    {
        
        this.setImage("/imagenes/globo.png");
        
        this.setLayout(new GridLayout(5, 1));
        this.setBackground(new Color((float)1,(float) 1,(float) 1,(float)0));
        this.setBorder(BorderFactory.createEmptyBorder(0, 10, 10, 10));
        this.setVisible(true);
        this.inicializar();
        this.addpanel();
       
       // this.setBounds(WIDTH, WIDTH, WIDTH, WIDTH);
    }
    private void inicializar()
    {
        
        
        animal  = new JTextField();
        animal.setVisible(true);
        descripcion = new JTextField();
        descripcion.setVisible(true);
        pregunta1  = new Texto(s1, false, 23);
        pregunta1.setVisible(true);
        pregunta2 = new JTextArea(s2);
        pregunta2.setBackground(new Color(1,1,1, (float) 0.01));
         pregunta2.setVisible(true);
       pregunta2. setEditable(false);
       pregunta2.setAlignmentX(CENTER);
       pregunta2.setAlignmentY(CENTER);
        pregunta2.setSelectedTextColor(null);
        pregunta2.setCursor(null);
        pregunta2.setLineWrap(true);
        pregunta2.setWrapStyleWord(true);
        pregunta2.setFont(new Font("Monospaced", Font.BOLD, 24));
        pregunta2.setForeground(new Color(110, 45, 0));
        pregunta2.setVisible(true);
    }
    private void addpanel()
    {
        
        this.add(pregunta1);
        this.add(animal);
        this.add(pregunta2);
        this.add(descripcion);
        this.add(Box.createRigidArea(new Dimension(0,5)));

    }
    public String getTextoAnimal()
    {
        return animal.getText();
    }
    public String getTextoDescripcion()
    {
        return descripcion.getText();
    }

    
}
