/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Vista;

import javax.swing.ImageIcon;
import javax.swing.JButton;

/**
 *
 * @author usuario
 */
public class Botones  extends JButton{
    private ImageIcon imb,imb2;
    public Botones(String s,String s2,int posx,int posy,boolean visibilidad)
    {
          imb = new ImageIcon(getClass().getResource(s));
         imb2 = new ImageIcon(getClass().getResource(s2));
        this.setIcon(imb);

        this.setVisible(visibilidad);
        this.setLocation(posx,posy);
        this.setSize(imb.getIconWidth(), imb.getIconHeight());
        this.setContentAreaFilled(false);
        this.setRolloverIcon(imb2);
        //Continuar.addActionListener(this); 710 250
        this.setBorder(null);
    }


}
