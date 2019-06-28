/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Vista;

import java.awt.Graphics;
import java.awt.Image;
import java.io.File;
import java.io.IOException;
import javax.imageio.ImageIO;
import javax.swing.ImageIcon;
import javax.swing.JTextArea;

public class textAreaImg extends JTextArea {

    private Image img;
    private ImageIcon imgi;
    public textAreaImg(String s) {
        //super(a,b);
        try{
            imgi = new ImageIcon(getClass().getResource(s));
            img =  imgi.getImage();
        } catch(Exception e) {
            System.out.println(e.toString());
        }
    }

    @Override
    protected void paintComponent(Graphics g) {
        g.drawImage(img,0,0,null);
        super.paintComponent(g);
    }
    public int alto()
    {
        return imgi.getIconHeight();
    }
    public int ancho()
    {
        return imgi.getIconWidth();
    }
}