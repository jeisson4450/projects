/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Vista;

import BD.BD;
import java.awt.Color;
import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JFrame;
import static javax.swing.SwingConstants.CENTER;
import ManejoArbol.Bosque;
import javax.swing.JButton;
import static java.lang.Math.abs;

/**
 *
 * @author usuario
 *
 */
public class Ventana extends JFrame implements ActionListener {

    BD basedatos = new BD();
    // final ImageIcon imageIcon = new ImageIcon(getClass().getResource("/imagenes/globo.png"));
    textAreaImg globo;
    Sugerencias suge;
    ModAdminVista administrador;
    ImagenFondo principal, mascota;
    Texto Titulo;
    JButton botonadm;
    Botones Continuar, si, no;
    int opcionsi = 1, opcionno = 1, opcioncon = 1;
    boolean im = true;
    String s = " ¡Bienvenido a Animaleitor! El sistema experto de animales domesticos, dale click al boton continuar para comenzar.";
    String s2 = " Para Comenzar primero debes pensar en un animal domestico. ¿Estas listo?";
    String s3 = " Ahora  yo intentare adivinar cual es el animal que tienes en mente, dale click al boton continuar. ";

    public Ventana() {
        this.setVisible(true);
        this.setResizable(true);
        this.addPrincipal();
        this.createBtnAdm();
        this.creaTitulo();
        this.CreaGlobo();
        this.modSugerencias();
        this.Mascota();
        this.BotonC();
        this.setBounds(250, 100, principal.horizontal(70), principal.vertical(70));

        this.setDefaultCloseOperation(EXIT_ON_CLOSE);

    }

    private void createBtnAdm() {
        botonadm = new JButton("!");
        botonadm.setBounds(840, 0, 55, 55);
        botonadm.setVisible(true);
        botonadm.addActionListener(this);
        principal.add(botonadm);
    }

    private void modSugerencias() {
        suge = new Sugerencias();
        suge.setBounds(Titulo.getBounds().x - 20, (Titulo.getBounds().y + Titulo.getBounds().height * 2) - 60, suge.horizontal(110), suge.vertical(160));
        suge.setVisible(false);
        principal.add(suge);

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
        globo.setFont(new Font("Monospaced", Font.BOLD, 16));
        globo.setForeground(new Color(110, 45, 0));

        globo.setBounds(Titulo.getBounds().x - 20, (Titulo.getBounds().y + Titulo.getBounds().height * 2) - 40, globo.ancho(), globo.alto());
        //JScrollPane scrollPane = new JScrollPane(globo);

        //scrollPane.setVisible(true);
        principal.add(globo);
        // principal.add(scrollPane);
    }

    private void creaTitulo() {
        Titulo = new Texto("ANIMALEITOR", false, 55);
        Titulo.setBounds(principal.horizontal(70) / 4, 10, 10 + principal.horizontal(70) / 2, 70);
        Titulo.setBorder(null);
        principal.add(Titulo);
    }

    private void addPrincipal() {
        principal = new ImagenFondo();
        principal.setImage("/Imagenes/imagen.jpg");
        principal.setLayout(null);
        this.add(principal);

    }

    private void cambioInterfaz1() {
        globo.setVisible(false);
        suge.setVisible(true);

    }
    private void cambioInterfaz2() {
        globo.setVisible(true);
        suge.setVisible(false);

    }

    @Override
    
    public void actionPerformed(ActionEvent ae) {
        //To change body of generated methods, choose Tools | Templates.
        if(ae.getSource().equals(botonadm))
        {
            administrador= new ModAdminVista();
        }
        if (ae.getSource().equals(Continuar)) {
            globo.setText(null);
            if (opcioncon == 1) {

                globo.setText(s2);
                opcioncon = 2;
                opcionno = 1;
            } else if (opcioncon == 2) {
                globo.setText(basedatos.consultar_experto(Bosque.getTree().getraiz()));
                //globo.setText("Primera consulta");
                opcionno = 2;
                opcioncon = 1;
                opcionsi = 2;
            } else if (opcioncon == 3) {
                String ruta = Bosque.getTree().imprimirCaminoBD();
                basedatos.escribir_sugerencia(basedatos.consultar_sugerenciaID() + 1, suge.getTextoAnimal(), suge.getTextoDescripcion(), ruta);
                Bosque.getTree().reiniciar();
                opcioncon=1;
                this.cambioInterfaz2();
                 globo.setText(s);
            }
            Continuar.setVisible(false);
            si.setVisible(true);
            no.setVisible(true);

            if (im) {
                mascota.repaint();
                mascota.setImage("/Imagenes/guia3.png");
                mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                im = false;
            } else {
                mascota.repaint();
                mascota.setImage("/Imagenes/guia2.png");
                mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                im = true;
            }

        } else if (ae.getSource().equals(no)) {
            globo.setText(null);
            if (opcionno == 1) {
                globo.setText(s);
                si.setVisible(false);
                no.setVisible(false);
                Continuar.setVisible(true);
                opcionno = 1;
                opcioncon = 1;
                if (im) {
                    mascota.repaint();
                    mascota.setImage("/Imagenes/guia3.png");
                    mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                    im = false;
                } else if (!im) {
                    mascota.repaint();
                    mascota.setImage("/Imagenes/guia2.png");
                    mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                    im = true;
                }
            } else if (opcionno == 2) {

//                    globo.setText(Bosque.getTree().recorrerString("F")+""); // recorre el arbol (arbol selvático)
//                    String mostrar = Bosque.getTree().insertarString("F")+"";
                String mostrar, existeFF, existeFV, existeVF, existeVV;
//                    mostrar = Bosque.getTree().insertarString("F") + "";
                boolean mostrarDescripcion = false;
                long idDesc = Bosque.getTree().insertarString("F");
                mostrar = basedatos.consultar_experto(idDesc);
//                    globo.setText(mostrar);
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
//                    idPadre = idAct;
//                    idAct = idNuevo;
//                    idNuevo = abs(idAct - abs((idAct - idPadre) / 2));
                existeFF = basedatos.consultar_experto(idNuevo);
                if (existeFF.equalsIgnoreCase("")) {
                    //el anterior es nodo hoja, se llega x el F - F
                    mostrarDescripcion = true;
                }

                // dos nodos siguientes F - V
                idNuevo = abs(idAct + abs((idAct - idPadre) / 2));
                existeFV = basedatos.consultar_experto(idNuevo);
                if (existeFV.equalsIgnoreCase("")) {
                    //el anterior es nodo hoja, se llega x el F - V
                    mostrarDescripcion = true;
                }

                // un nodo siguiente V
                idAct = Bosque.getTree().getCamino().get(numNodos - 1);
                idPadre = Bosque.getTree().getCamino().get(numNodos - 2);
                idNuevo = abs(idAct + abs((idAct - idPadre) / 2));

                // dos nodos siguientes V - F
//                    idPadre = idAct;
//                    idAct = idNuevo;
//                    idNuevo = abs(idAct - abs((idAct - idPadre) / 2));
                existeVF = basedatos.consultar_experto(idNuevo);
                if (existeFF.equalsIgnoreCase("")) {
                    //el anterior es nodo hoja, se llega x el V - F
                    mostrarDescripcion = true;
                }

                // dos nodos siguientes V - V
                idNuevo = abs(idAct + abs((idAct - idPadre) / 2));
                existeVV = basedatos.consultar_experto(idNuevo);
                if (existeFV.equalsIgnoreCase("")) {
                    //el anterior es nodo hoja, se llega x el V - V
                    mostrarDescripcion = true;
                }
                if (mostrarDescripcion) {
                    mostrar += "\n" + basedatos.consultar_expertoDesc(idDesc);
                    opcionno = 3;
                    opcionsi = 3;
                    Bosque.getTree().getCamino().add((long) 0);
                } else {
                    opcionsi = 2;
                    opcionno = 2;
                }
                globo.setText(null);
                globo.setText(mostrar);
                //globo.setText("otra consulta");

//                    */
                if (im) {
                    mascota.repaint();
                    mascota.setImage("/Imagenes/guia3.png");
                    mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                    im = false;
                } else if (!im) {
                    mascota.repaint();
                    mascota.setImage("/Imagenes/guia2.png");
                    mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                    im = true;
                }

            } else if (opcionno == 3) {
                mascota.repaint();
                this.cambioInterfaz1();
                mascota.setImage("/Imagenes/guia4.png");
                mascota.setBounds(20, 250, mascota.horizontal(50), mascota.vertical(50)); //              ----------------------------       MODIFICAAR AQUI------------------
                im = true;
                opcionno = 1;
                Continuar.setVisible(true);
                si.setVisible(false);
                no.setVisible(false);
                opcioncon = 3;
                
            }

        } else if (ae.getSource().equals(si)) {
            globo.setText(null);

            if (opcionsi == 1) {
                globo.setText(s3);
                si.setVisible(false);
                no.setVisible(false);
                Continuar.setVisible(true);
                opcionno = 2;
                opcioncon = 2;
                if (im) {
                    mascota.repaint();
                    mascota.setImage("/Imagenes/guia3.png");
                    mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                    im = false;
                } else if (!im) {
                    mascota.repaint();
                    mascota.setImage("/Imagenes/guia2.png");
                    mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                    im = true;
                }
            } else if (opcionsi == 2) {
                // Bosque.getTree().recorrerString("V");
//               globo.setText(Bosque.getTree().recorrerString("V")+"");
//                globo.setText(Bosque.getTree().insertarString("V") + "");
                String mostrar, existeFF, existeFV, existeVF, existeVV;
                boolean mostrarDescripcion = false;
//                mostrar = Bosque.getTree().insertarString("V") + "";
                long idDesc = Bosque.getTree().insertarString("V");
                mostrar = basedatos.consultar_experto(idDesc);
//                globo.setText(mostrar);
                System.out.print("V: ");
                Bosque.getTree().imprimirCamino2();
                // mirando si hay un nodo hoja
                int numNodos = Bosque.getTree().getCamino().size();
                long idAct, idPadre, idNuevo;
                // un nodo siguiente F
                idAct = Bosque.getTree().getCamino().get(numNodos - 1);
                idPadre = Bosque.getTree().getCamino().get(numNodos - 2);
                idNuevo = abs(idAct - abs((idAct - idPadre) / 2));
//
//                // dos nodos siguientes F - F
//                idPadre = idAct;
//                idAct = idNuevo;
//                idNuevo = abs(idAct - abs((idAct - idPadre) / 2));
                existeFF = basedatos.consultar_experto(idNuevo);
                if (existeFF.equalsIgnoreCase("")) {
                    //el anterior es nodo hoja, se llega x el F - F
                    mostrarDescripcion = true;

                }

                // dos nodos siguientes F - V
                idNuevo = abs(idAct + abs((idAct - idPadre) / 2));
                existeFV = basedatos.consultar_experto(idNuevo);
                if (existeFV.equalsIgnoreCase("")) {
                    //el anterior es nodo hoja, se llega x el F - V
                    mostrarDescripcion = true;
                }

                // un nodo siguiente V
                idAct = Bosque.getTree().getCamino().get(numNodos - 1);
                idPadre = Bosque.getTree().getCamino().get(numNodos - 2);
                idNuevo = abs(idAct + abs((idAct - idPadre) / 2));

//                // dos nodos siguientes V - F
//                idPadre = idAct;
//                idAct = idNuevo;
//                idNuevo = abs(idAct - abs((idAct - idPadre) / 2));
                existeVF = basedatos.consultar_experto(idNuevo);
                if (existeFF.equalsIgnoreCase("")) {
                    //el anterior es nodo hoja, se llega x el V - F
                    mostrarDescripcion = true;
                }

                // dos nodos siguientes V - V
                idNuevo = abs(idAct + abs((idAct - idPadre) / 2));
                existeVV = basedatos.consultar_experto(idNuevo);
                if (existeFV.equalsIgnoreCase("")) {
                    //el anterior es nodo hoja, se llega x el V - V
                    mostrarDescripcion = true;
                }
                if (mostrarDescripcion) {
                    mostrar += "\n" + basedatos.consultar_expertoDesc(idDesc);
                    opcionno = 3;
                    opcionsi = 3;
                    Bosque.getTree().getCamino().add((long) 1);
                } else {
                    opcionsi = 2;
                    opcionno = 2;
                }
                globo.setText(null);
                globo.setText(mostrar);

                System.out.print("V: ");
                Bosque.getTree().imprimirCamino2();
                if (im) {
                    mascota.repaint();
                    mascota.setImage("/Imagenes/guia3.png");
                    mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                    im = false;
                } else if (!im) {
                    mascota.repaint();
                    mascota.setImage("/Imagenes/guia2.png");
                    mascota.setBounds(30, 250, mascota.horizontal(50), mascota.vertical(50));
                    im = true;
                }

            } else if (opcionsi == 3) {
                mascota.repaint();
                //this.cambioInterfaz();
                mascota.setImage("/Imagenes/guia5.png");
                mascota.setBounds(12, 230, mascota.horizontal(50), mascota.vertical(50));
                globo.setText(null);
                globo.setText("  Eres el mejor de todo el mundo entero");//              ----------------------------       MODIFICAAR AQUI------------------
                im = false;
                opcionsi = 1;
                opcionno = 1;
                opcioncon = 1;
                Bosque.getTree().reiniciar();
                si.setVisible(false);
                no.setVisible(false);
                Continuar.setVisible(true);
            }

        }
        System.out.println(opcioncon + " " + opcionsi + " " + opcionno);
    }

}
