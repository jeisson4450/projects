package Vista;

import java.awt.Color;
import java.awt.Font;

import javax.swing.JLabel;
import java.awt.Color;
import java.awt.Dimension;
import javax.swing.JLabel;
import static javax.swing.SwingConstants.CENTER;
import javax.swing.border.AbstractBorder;

/**
 *
 * @author Anggie Katherine Ovalle Velez
 * @author Andres Guillermo Ramirez Castro
 * @author Fredy Enrique Vaengas Vargas
 */
public class Texto extends JLabel {
   // private AbstractBorder circleBorder = new CircleBorder();       
   

    public Texto(String s,boolean flag,int letra) {
        this.setText(s);
        this.setVisible(true);
        this.setBackground(new Color((float)1,(float) 1,(float) 1,(float)0.8));
        this.setFont(new Font("Monospaced", Font.BOLD, letra));
        this.setOpaque(flag);
        setForeground(new Color(110, 45, 0));
        
        setHorizontalAlignment(CENTER);
        setVerticalAlignment(TOP);
       // setBorder(circleBorder);

    }

    public String getTexto() {
        return this.getText();
    }

    public void setTexto(String s) {
        this.setText(s);
    }

}
