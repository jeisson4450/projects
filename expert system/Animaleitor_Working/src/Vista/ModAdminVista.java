/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Vista;

import java.awt.Color;
import java.awt.Dimension;
import java.awt.GridLayout;
import java.awt.LayoutManager;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import javax.swing.Box;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JTextArea;

/**
 *
 * @author jbmalaver
 */
public class ModAdminVista extends JFrame implements ActionListener{
    
    private JPanel principal;
    private JButton enviar, consultar;
    private JTextArea asuge, desuge, prem1se, des1se, prem2se,des2se ;
            
            
    
    public ModAdminVista ()
    { 
        this.setVisible(true);
        this.setBounds(400, 400, 450, 400);
        principal = new JPanel();
        principal.setBackground(new Color(0,51,102));
        enviar = new JButton("Enviar");
        enviar.setBounds(280, 260, 100, 50);
        enviar.addActionListener(this);
        consultar = new JButton("Consultar");
        consultar.setBounds(80, 260, 100, 50);
        consultar.addActionListener(this);
        asuge = new JTextArea("Animal sugerencia");
        asuge.setBounds(50, 50, 150, 50);
        asuge.setCursor(null);
        asuge.setLineWrap(true);
        asuge.setWrapStyleWord(true);
        desuge = new JTextArea("Descripcion que lo define");
        desuge.setBounds(250, 50, 150, 50);
        desuge.setCursor(null);
        desuge.setLineWrap(true);
        desuge.setWrapStyleWord(true);
        des1se= new JTextArea("definicion de nodo padre");
        des1se.setBounds(250, 120, 150, 50);
        des1se.setCursor(null);
        des1se.setLineWrap(true);
        des1se.setWrapStyleWord(true);
        prem1se = new JTextArea("nodo padre");
        prem1se.setBounds(50, 120, 150, 50);
        prem1se.setCursor(null);
        prem1se.setLineWrap(true);
        prem1se.setWrapStyleWord(true);
        des2se= new JTextArea("descripcion animal");
        des2se.setBounds(250, 190, 150, 50);
        des2se.setCursor(null);
        des2se.setLineWrap(true);
        des2se.setWrapStyleWord(true);
        prem2se= new JTextArea("tu animal es este animal ?");
        prem2se.setBounds(50, 190, 150, 50);
        prem2se.setCursor(null);
        prem2se.setLineWrap(true);
        prem2se.setWrapStyleWord(true);
        
        // listo!!
        
        
        principal.setLayout(null);
        
        principal.add(asuge);
        principal.add(desuge);

        principal.add(consultar);
        principal.add(enviar);
        principal.add(prem1se);
        principal.add(des1se);
        principal.add(prem2se);
        principal.add(des2se);
         
        this.add(principal);
        
        //que necesita? 
        // revisar...   emmm neceSelect * from tabla xD
        //los metodos de sql están en dejeme ver registros porfaq
        //voy  -- listo  
        //ahora si, revisare lo que quiero ver
        
        
        //GRACIAS
    }

    @Override
    public void actionPerformed(ActionEvent e) {
        
      if(e.getSource().equals(enviar))
      {
          
      }
      else if(e.getSource().equals(consultar))
      {
          ModAdmin sugerenciasBD = new ModAdmin();
          ArrayList<ModAdmin> lista = new ArrayList<>();
          sugerenciasBD.consultarExperto();
          lista = sugerenciasBD.getListaSugerencias();
          String a1, a2;
          if(!lista.isEmpty())
          {
            a1 = lista.get(0).getAnimal();
            a2 = lista.get(0).getDescripcionPremisa();
            asuge.setText(null);
            desuge.setText(null);
            asuge.setText(a1);
            desuge.setText(a2);
            
          }
          
      }
        
        
        
        
    }
               
}
