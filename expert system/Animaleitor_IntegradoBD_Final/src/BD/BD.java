package BD;

import java.sql.*;

public class BD {

    private Connection conexion;
    private Statement stmt;

    public Connection getConexion() {
        return conexion;
    }

    public void setConexion(Connection conexion) {
        this.conexion = conexion;
    }

    public BD conectar() {
        try {
            Class.forName("oracle.jdbc.OracleDriver");
            String BaseDeDatos = "jdbc:oracle:thin:@localhost:1521:XE";

            conexion = DriverManager.getConnection(BaseDeDatos, "animaleitor", "animaleitor");
            if (conexion != null) {
                System.out.println("Conexion exitosa!");
            } else {
                System.out.println("Conexion fallida!");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return this;
    }

//    public boolean escribir_experto(int IDP, int ID, String PREMISA, String DESCRIPCION) {
    public boolean escribir_experto(int IDP, long ID, String PREMISA, String DESCRIPCION) {
        try {
            conectar();  //mod fredy
            String sql = "INSERT INTO SISTEMA_EXPERTO VALUES (" + IDP + "" + ID + ",'" + PREMISA + "','" + DESCRIPCION + "')";
            Statement sentencia;
            sentencia = getConexion().createStatement(ResultSet.TYPE_FORWARD_ONLY, ResultSet.CONCUR_READ_ONLY);
            sentencia.executeUpdate(sql);
            getConexion().commit();
            sentencia.close();

        } catch (SQLException e) {
            e.printStackTrace();
            System.out.print("ERROR SQL");
            return false;
        } finally {
            desconectar();  //mod fredy
        }
        return true;
    }

//    public boolean escribir_sugerencia(int ID, String ANIMAL, String PREMISA) {
    public boolean escribir_sugerencia(long ID, String ANIMAL, String PREMISA, String RUTA) {
        try {
            conectar();  //mod fredy
            String sql = "INSERT INTO ACTUALIZACION VALUES (" + ID + ",'" + ANIMAL + "','" + PREMISA + "', '" + RUTA + "')";
            Statement sentencia;
            sentencia = getConexion().createStatement(ResultSet.TYPE_FORWARD_ONLY, ResultSet.CONCUR_READ_ONLY);
            sentencia.executeUpdate(sql);
            getConexion().commit();
            sentencia.close();

        } catch (SQLException e) {
            e.printStackTrace();
            System.out.print("ERROR SQL");
            return false;
        }
        return true;
    }

//    public boolean eliminar_sugerencia(int ID) {
    public boolean eliminar_sugerencia(long ID) {
        try {
            conectar();  //mod fredy
            String sql = "DELETE FROM ACTUALIZACION WHERE ID=" + ID;
            Statement sentencia;
            sentencia = getConexion().createStatement(ResultSet.TYPE_FORWARD_ONLY, ResultSet.CONCUR_READ_ONLY);
            sentencia.executeUpdate(sql);
            getConexion().commit();
            sentencia.close();

        } catch (SQLException e) {
            e.printStackTrace();
            System.out.print("ERROR SQL");
            return false;
        } finally {
            desconectar();  //mod fredy
        }
        return true;
    }

//    public String consultar_experto(int ID) {
    public String consultar_experto(long ID) {
        String devolver = "";
        try {
            conectar();  //mod fredy

//        throws SQLException {
            String consulta = "SELECT * FROM SISTEMA_EXPERTO WHERE ID=" + ID;
            Statement stmt = conexion.createStatement();
            ResultSet rs = stmt.executeQuery(consulta);
            devolver = "";

            while (rs.next()) {
                int x = rs.getInt("IDP");
                int s = rs.getInt("ID");
                String f = rs.getString("PREMISA");
                String g = rs.getString("DESCRIPCION");
                devolver = f;
            }
        } catch (Exception e) {
            e.printStackTrace();
            System.out.print("ERROR SQL");
        } finally {
            desconectar();  //mod fredy
        }
        return devolver;
    }

    public String consultar_expertoDesc(long ID) {
        String devolver = "";
        try {
            conectar();  //mod fredy

//        throws SQLException {
            String consulta = "SELECT * FROM SISTEMA_EXPERTO WHERE ID=" + ID;
            Statement stmt = conexion.createStatement();
            ResultSet rs = stmt.executeQuery(consulta);
            devolver = "";

            while (rs.next()) {
                int x = rs.getInt("IDP");
                int s = rs.getInt("ID");
                String f = rs.getString("PREMISA");
                String g = rs.getString("DESCRIPCION");
                devolver = g;
            }
        } catch (Exception e) {
            e.printStackTrace();
            System.out.print("ERROR SQL");
        } finally {
            desconectar();  //mod fredy
        }
        return devolver;
    }

    public void consultar_sugerencia() {
        try {
            conectar();  //mod fredy

//            throws SQLException {
            String consulta = "SELECT * FROM ACTUALIZACION";
            Statement stmt = conexion.createStatement();
            ResultSet rs = stmt.executeQuery(consulta);

            while (rs.next()) {
                int s = rs.getInt("ID");
                String f = rs.getString("ANIMAL");
                String g = rs.getString("PREMISA");
                String h = rs.getString("RUTA");
                System.out.println(s + " " + f + " " + g + " " + h);
            }
        } catch (Exception e) {
            e.printStackTrace();
            System.out.print("ERROR SQL");
        } finally {
            desconectar();  //mod fredy
        }
    }

    public int consultar_sugerenciaID() {
        int id = 0;
        try {
            conectar();  //mod fredy

//            throws SQLException {
            String consulta = "SELECT COUNT(*) as ID FROM ACTUALIZACION";
            Statement stmt = conexion.createStatement();
            ResultSet rs = stmt.executeQuery(consulta);

            while (rs.next()) {
                int s = rs.getInt("ID");
//                String f = rs.getString("ANIMAL");
//                String g = rs.getString("PREMISA");
//                String h = rs.getString("RUTA");
//                System.out.println(s + " " + f + " " + g + " " + h);
                id = s;
            }
        } catch (Exception e) {
            e.printStackTrace();
            System.out.print("ERROR SQL");
        } finally {
            desconectar();  //mod fredy
        }
        return id;
    }

    public boolean desconectar() {
        try {
            conexion.close();
            System.out.println("Conexion Cerrada");
            return true;
        } catch (Exception SQLException) {
            return false;
        }
    }
}
