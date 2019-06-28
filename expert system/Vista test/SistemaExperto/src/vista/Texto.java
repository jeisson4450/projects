package vista;

import java.awt.Color;
import java.awt.Font;

import javax.swing.JLabel;

/**
 *
 * @author Anggie Katherine Ovalle Velez
 * @author Andres Guillermo Ramirez Castro
 * @author Fredy Enrique Vaengas Vargas
 */
public class Texto extends JLabel {

    public Texto(String s) {
        this.setText(s);
        this.setVisible(true);
        this.setFont(new Font("Monospaced", Font.BOLD, 55));
        this.setOpaque(false);
        setForeground(new Color(110, 45, 0));
        //setHorizontalAlignment(CENTER);
        setVerticalAlignment(CENTER);

    }

    public String getTexto() {
        return this.getText();
    }

    public void setTexto(String s) {
        this.setText(s);
    }

}
