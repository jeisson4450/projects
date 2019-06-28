/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Vista;

import BD.BD;
import ManejoArbol.Bosque;
import java.awt.Color;
import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import static java.lang.Math.abs;
import javax.swing.JFrame;
import static javax.swing.SwingConstants.CENTER;

/**
 *
 * @author usuario
 *
 */
public class Ventana extends JFrame implements ActionListener {

    // final ImageIcon imageIcon = new ImageIcon(getClass().getResource("/imagenes/globo.png"));
    textAreaImg globo;
    BD basedatos = new BD();

    ImagenFondo principal, mascota;
    Texto Titulo;

    Botones Continuar, si, no;
    boolean bsi = true, bno = true, bcon = true, im = true;
    String s = " ¡Bienvenido a Animaleitor! El sistema experto de animales domesticos, dale click al boton continuar para comenzar.";
    String s2 = " Para Comenzar primero debes pensar en un animal domestico. ¿Estas listo?";
    String s3 = " Ahora  yo intentare adivinar cual es el animal que tienes en mente, dale click al boton continuar. ";

    public Ventana() {
        this.setVisible(true);
        //  this.setResizable(false);
        this.addPrincipal();
        this.creaTitulo();
        this.CreaGlobo();
        this.Mascota();
        this.BotonC();

        this.setBounds(250, 100, principal.horizontal(70), principal.vertical(70));

        this.setDefaultCloseOperation(EXIT_ON_CLOSE);

    }

    private void BotonC() {
        Continuar = new Botones("/imagenes/continuar.png", "/imagenes/continuar2.png", 710, 220, true);
        si = new Botones("/imagenes/si.png", "/imagenes/si2.png", 710, 170, false);
        no = new Botones("/imagenes/no.png", "/imagenes/no2.png", 710, 275, false);
        si.addActionListener(this);
        no.addActionListener(this);
        Continuar.addActionListener(this);
        principal.add(Continuar);
        principal.add(si);
        principal.add(no);
    }

    private void Mascota() {
        mascota = new ImagenFondo();
        mascota.setVisible(true);
        mascota.setBackground(new Color((float) 1, (float) 1, (float) 1, (float) 0));
        mascota.setImage("/Imagenes/guia1.png");
        mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));

        principal.add(mascota);
    }

    private void CreaGlobo() {

        globo = new textAreaImg("/imagenes/globo.png");

        //globo.setBackground(new Color((float)(144.0/255.0),(float) (217.0/255.0),(float) (255.0/255.0),(float)0.7));
        globo.setBackground(new Color(1, 1, 1, (float) 0.01));
        globo.setVisible(true);
        globo.setEditable(false);
        globo.setAlignmentX(CENTER);
        globo.setAlignmentY(CENTER);
        globo.setSelectedTextColor(null);
        globo.setCursor(null);
        globo.setLineWrap(true);
        globo.setWrapStyleWord(true);
        globo.setText(s);
        globo.setFont(new Font("Monospaced", Font.BOLD, 24));
        globo.setForeground(new Color(110, 45, 0));

        globo.setBounds(Titulo.getBounds().x - 20, (Titulo.getBounds().y + Titulo.getBounds().height * 2) - 40, globo.ancho(), globo.alto());
        //JScrollPane scrollPane = new JScrollPane(globo);

        //scrollPane.setVisible(true);
        principal.add(globo);
        // principal.add(scrollPane);
    }

    private void creaTitulo() {
        Titulo = new Texto("ANIMALEITOR", false, 55);
        Titulo.setBounds(principal.horizontal(70) / 4, 30, 10 + principal.horizontal(70) / 2, 70);
        Titulo.setBorder(null);
        principal.add(Titulo);
    }

    private void addPrincipal() {
        principal = new ImagenFondo();
        principal.setImage("/Imagenes/imagen.jpg");
        principal.setLayout(null);
        this.add(principal);

    }

    @Override
    public void actionPerformed(ActionEvent ae) {
        //To change body of generated methods, choose Tools | Templates.

        if (ae.getSource().equals(Continuar)) {
            globo.setText(null);
            if (bcon) {

                globo.setText(s2);
                bcon = false;
                bno = true;
            } else {
                globo.setText(Bosque.getTree().getraiz() + "");
                //globo.setText("Primera consulta");
                bno = false;
                bcon = true;
                bsi = false;
            }
            Continuar.setVisible(false);
            si.setVisible(true);
            no.setVisible(true);
            mascota.repaint();
            if (im) {
                mascota.setImage("/Imagenes/guia3.png");
                mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                im = false;
            } else {
                mascota.setImage("/Imagenes/guia2.png");
                mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                im = true;
            }

        } else if (ae.getSource().equals(no)) {
            globo.setText(null);
            if (bno) {
                globo.setText(s);
                si.setVisible(false);
                no.setVisible(false);
                Continuar.setVisible(true);
                bno = false;
                bcon = true;

            } else {

                boolean fin = false;
                if (fin) {
                    globo.setText("estas de acuerdo ?");
                } else {

//                    globo.setText(Bosque.getTree().recorrerString("F")+""); // recorre el arbol (arbol selvático)
//                    String mostrar = Bosque.getTree().insertarString("F")+"";
                    String mostrar, existeFF, existeFV, existeVF, existeVV;
                    mostrar = Bosque.getTree().insertarString("F") + "";
//                    mostrar = basedatos.consultar_experto(Bosque.getTree().insertarString("F"));
                    globo.setText(mostrar);
                    System.out.print("F: ");
//                    /*
                    Bosque.getTree().imprimirCamino2();
                    // mirando si hay un nodo hoja
                    int numNodos = Bosque.getTree().getCamino().size();
                    long idAct, idPadre, idNuevo;
                    // un nodo siguiente F
                    idAct = Bosque.getTree().getCamino().get(numNodos - 1);
                    idPadre = Bosque.getTree().getCamino().get(numNodos - 2);
                    idNuevo = abs(idAct - abs((idAct - idPadre) / 2));

                    // dos nodos siguientes F - F
                    idPadre = idAct;
                    idAct = idNuevo;
                    idNuevo = abs(idAct - abs((idAct - idPadre) / 2));
                    existeFF = basedatos.consultar_experto(idNuevo);
                    if (existeFF.equalsIgnoreCase("")) {
                        //el anterior es nodo hoja, se llega x el F - F
                    }

                    // dos nodos siguientes F - V
                    idNuevo = abs(idAct + abs((idAct - idPadre) / 2));
                    existeFV = basedatos.consultar_experto(idNuevo);
                    if (existeFV.equalsIgnoreCase("")) {
                        //el anterior es nodo hoja, se llega x el F - V
                    }

                    // un nodo siguiente V
                    idAct = Bosque.getTree().getCamino().get(numNodos - 1);
                    idPadre = Bosque.getTree().getCamino().get(numNodos - 2);
                    idNuevo = abs(idAct + abs((idAct - idPadre) / 2));

                    // dos nodos siguientes V - F
                    idPadre = idAct;
                    idAct = idNuevo;
                    idNuevo = abs(idAct - abs((idAct - idPadre) / 2));
                    existeVF = basedatos.consultar_experto(idNuevo);
                    if (existeFF.equalsIgnoreCase("")) {
                        //el anterior es nodo hoja, se llega x el V - F
                    }

                    // dos nodos siguientes V - V
                    idNuevo = abs(idAct + abs((idAct - idPadre) / 2));
                    existeVV = basedatos.consultar_experto(idNuevo);
                    if (existeFV.equalsIgnoreCase("")) {
                        //el anterior es nodo hoja, se llega x el V - V
                    }
                    //globo.setText("otra consulta");

//                    */
                }
            }
            mascota.repaint();
            if (im) {
                mascota.setImage("/Imagenes/guia3.png");
                mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                im = false;
            } else {
                mascota.setImage("/Imagenes/guia2.png");
                mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                im = true;
            }

        } else if (ae.getSource().equals(si)) {
            globo.setText(null);
            mascota.repaint();
            if (bsi) {
                globo.setText(s3);
                si.setVisible(false);
                no.setVisible(false);
                Continuar.setVisible(true);
                bno = false;
                bcon = false;
            } else {
                // Bosque.getTree().recorrerString("V");
//               globo.setText(Bosque.getTree().recorrerString("V")+"");
//                globo.setText(Bosque.getTree().insertarString("V") + "");
                String mostrar, existeFF, existeFV, existeVF, existeVV;
                mostrar = Bosque.getTree().insertarString("V") + "";
//                mostrar = basedatos.consultar_experto(Bosque.getTree().insertarString("V"));
                globo.setText(mostrar);
                System.out.print("V: ");
                Bosque.getTree().imprimirCamino2();
                // mirando si hay un nodo hoja
                int numNodos = Bosque.getTree().getCamino().size();
                long idAct, idPadre, idNuevo;
                // un nodo siguiente F
                idAct = Bosque.getTree().getCamino().get(numNodos - 1);
                idPadre = Bosque.getTree().getCamino().get(numNodos - 2);
                idNuevo = abs(idAct - abs((idAct - idPadre) / 2));

                // dos nodos siguientes F - F
                idPadre = idAct;
                idAct = idNuevo;
                idNuevo = abs(idAct - abs((idAct - idPadre) / 2));
                existeFF = basedatos.consultar_experto(idNuevo);
                if (existeFF.equalsIgnoreCase("")) {
                    //el anterior es nodo hoja, se llega x el F - F
                }

                // dos nodos siguientes F - V
                idNuevo = abs(idAct + abs((idAct - idPadre) / 2));
                existeFV = basedatos.consultar_experto(idNuevo);
                if (existeFV.equalsIgnoreCase("")) {
                    //el anterior es nodo hoja, se llega x el F - V
                }

                // un nodo siguiente V
                idAct = Bosque.getTree().getCamino().get(numNodos - 1);
                idPadre = Bosque.getTree().getCamino().get(numNodos - 2);
                idNuevo = abs(idAct + abs((idAct - idPadre) / 2));

                // dos nodos siguientes V - F
                idPadre = idAct;
                idAct = idNuevo;
                idNuevo = abs(idAct - abs((idAct - idPadre) / 2));
                existeVF = basedatos.consultar_experto(idNuevo);
                if (existeFF.equalsIgnoreCase("")) {
                    //el anterior es nodo hoja, se llega x el V - F
                }

                // dos nodos siguientes V - V
                idNuevo = abs(idAct + abs((idAct - idPadre) / 2));
                existeVV = basedatos.consultar_experto(idNuevo);
                if (existeFV.equalsIgnoreCase("")) {
                    //el anterior es nodo hoja, se llega x el V - V
                }

                System.out.print("V: ");
                Bosque.getTree().imprimirCamino2();
                bno = false;
                bcon = false;
                bsi = false;

            }
            if (im) {
                mascota.setImage("/Imagenes/guia3.png");
                mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                im = false;
            } else {
                mascota.setImage("/Imagenes/guia2.png");
                mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                im = true;
            }

        }
    }

}
