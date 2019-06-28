package vista;
import java.awt.Graphics;
import java.awt.Image;
import javax.swing.ImageIcon;
import javax.swing.JPanel;

public class ImagenFondo extends JPanel {
	private int h,v;
	//Fuente http://www.forosdelweb.com/f45/como-agregar-imagen-jpanel-982990/
    private Image fondo=null;
    @Override
    protected void paintComponent(Graphics g){
        super.paintComponent(g);
        g.drawImage(fondo,0,0,getWidth(),getHeight(),null);
        
    }
    public void setImage(String image){
        if (image!=null) {
            fondo=new ImageIcon(getClass().getResource(image)).getImage();
        }
       v= fondo.getHeight(null);
       h= fondo.getWidth(null);
    }
    //fin C�digo citado
    public int horizontal()
    {
    	//System.out.println(h);
    	
    	return (int)(h*70)/100;
    }
    public int vertical()
    {
    	//System.out.println(v);
    	return (int)(v*70)/100;
    }

}
