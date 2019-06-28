
package oracle; 
import java.sql.*; 

public class BD { 
private Connection conexion; 
private Statement stmt;
     
public Connection getConexion() { 
    return conexion; 
}    public void setConexion(Connection conexion) { 
    this.conexion = conexion; 
}  



public BD conectar() { 
    try { 
        Class.forName("oracle.jdbc.OracleDriver"); 
        String BaseDeDatos = "jdbc:oracle:thin:@localhost:1521:XE"; 
          
        conexion = DriverManager.getConnection(BaseDeDatos, "animaleitor","animaleitor");             
        if (conexion != null) { 
            System.out.println("Conexion exitosa!"); 
        } else { 
            System.out.println("Conexion fallida!"); 
        } 
    } catch (Exception e) { 
        e.printStackTrace(); 
    }        return this; 
} 

public boolean escribir_experto(int IDP,int ID, String PREMISA, String DESCRIPCION ) { 
        try {
            String sql="INSERT INTO SISTEMA_EXPERTO VALUES ("+IDP+""+ID+",'"+PREMISA+"','"+DESCRIPCION+"')";
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

public boolean escribir_sugerencia(int ID, String ANIMAL, String PREMISA ) { 
        try {
            String sql="INSERT INTO ACTUALIZACION VALUES ("+ID+",'"+ANIMAL+"','"+PREMISA+"')";
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

public boolean eliminar_sugerencia(int ID) { 
        try {
            String sql="DELETE FROM ACTUALIZACION WHERE ID="+ID;
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

public String consultar_experto(int ID) throws SQLException{
    String consulta = "SELECT *FROM SISTEMA_EXPERTO WHERE ID="+ID;
    Statement stmt = conexion.createStatement();
    ResultSet rs = stmt.executeQuery(consulta);
    String devolver="";

    while (rs.next()) {
        int x = rs.getInt("IDP");
        int s = rs.getInt("ID");
        String f = rs.getString("PREMISA");
        String g = rs.getString("DESCRIPCION");
        devolver = f;
    }
    
    return devolver;
}

public void consultar_sugerencia() throws SQLException {
    String consulta = "SELECT *from ACTUALIZACION";
    Statement stmt = conexion.createStatement();
    ResultSet rs = stmt.executeQuery(consulta);

    while (rs.next()) {
        int s = rs.getInt("ID");
        String f= rs.getString("ANIMAL");
        String g = rs.getString("PREMISA");
        System.out.println(s+" "+f+" "+g);
    }
}

public boolean desconectar() {
    try 
    {
        conexion.close();
        System.out.println("Conexion Cerrada");
	return true;
    }
    catch (Exception SQLException) {
	return false;
    }
}
} 