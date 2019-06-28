/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Vista;

import BD.BD;
import static java.lang.Math.abs;
import java.util.ArrayList;

/**
 *
 * @author Usuario
 */
public class ModAdmin {

//<editor-fold defaultstate="collapsed" desc="variables globales">
    public ArrayList<ModAdmin> listaSugerencias;
    private BD basedatos = new BD();
    private int idBD;
    private long idArbol;
    private String ruta;
    private String animal;
    private String descripcionPremisa;
//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="getters y setters">
    public String getRuta() {
        return ruta;
    }

    public void setRuta(String ruta) {
        this.ruta = ruta;
    }

    public ArrayList<ModAdmin> getListaSugerencias() {
        return listaSugerencias;
    }

    public void setListaSugerencias(ArrayList<ModAdmin> listaSugerencias) {
        this.listaSugerencias = listaSugerencias;
    }

    public String getAnimal() {
        return animal;
    }

    public void setAnimal(String animal) {
        this.animal = animal;
    }

    public String getDescripcionPremisa() {
        return descripcionPremisa;
    }

    public void setDescripcionPremisa(String descripcionPremisa) {
        this.descripcionPremisa = descripcionPremisa;
    }
//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="constructores">
    public ModAdmin() {

    }

    public ModAdmin(int idBD, String animal, String premisa, String ruta) {
        this.idBD = idBD;
        this.animal = animal;
        this.descripcionPremisa = premisa;
        this.ruta = ruta;
    }
//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="metodos y funciones">
    public void consultarExperto() {
        listaSugerencias = basedatos.consultar_sugerenciaLista();
    }

    public void eliminarSugerenciaLista() {
        if (!listaSugerencias.isEmpty()) {
            listaSugerencias.remove(0);
            eliminarSugerenciaBD(0);
        }

    }

    protected void insertarSugerencia(int idLista, String animal, String descAnimal, String premisa, String descPremisa) {
        idLista = 0;
        ModAdmin sugeInsert = listaSugerencias.get(idLista);
        String[] cantRuta = sugeInsert.getRuta().split(",");
        String idPa = "", idAc = "", des = "";
        long idNuevo = 0, idAct = 0, idPadre = 0, desicion = 0;
        idPa = cantRuta[cantRuta.length - 3];
        idAc = cantRuta[cantRuta.length - 2];
        des = cantRuta[cantRuta.length - 1];
        idAct = Integer.parseInt(idAc); // se cambia el animal x la premisa
        idPadre = Integer.parseInt(idPa);
        desicion = Integer.parseInt(des);
//        if (desicion == 0) {
//            idNuevo = abs(idAct - abs((idAct - idPadre) / 2));
//        } else if (desicion == 1) {
//            idNuevo = abs(idAct + abs((idAct - idPadre) / 2));
//        }

        idNuevo = abs(idAct - abs((idAct - idPadre) / 2));
        basedatos.actualizar_expertoID(idAct, idNuevo); // revisar
        idNuevo = abs(idAct + abs((idAct - idPadre) / 2));
        basedatos.escribir_experto(basedatos.consultar_sugerenciaID() + 1, idNuevo, animal, descAnimal); // revisar
        basedatos.escribir_experto(basedatos.consultar_sugerenciaID() + 1, idAct, premisa, descPremisa); // revisar

    }

    private void eliminarSugerenciaBD(int idBD) {
        basedatos.eliminar_sugerencia(idBD);
    }
//</editor-fold>

}
