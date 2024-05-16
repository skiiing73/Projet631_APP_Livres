import java.sql.*;

import javax.imageio.plugins.bmp.BMPImageWriteParam;

public class Connexion_BDD {
    public static void main(String[] args) throws Exception {
        // String url = "jdbc:mysql://projet-idu.hqbr.win/projet";
        // String user = "dev";
        // String password = "8a*#Hk$2Fq@p&9z!";

        // Connection con = DriverManager.getConnection(url, user, password);
        // if (con != null) {
        // System.out.println("Database Connected successfully");
        // // étape 3: créer l'objet statement
        // Statement stmt = con.createStatement();
        // ResultSet res = stmt.executeQuery("SELECT * FROM zone");
        // // étape 4: exécuter la requête
        // while (res.next())
        // System.out.println(res.getInt(1) + " " + res.getString(2)
        // + " " + res.getString(3));
        // // étape 5: fermer l'objet de connexion
        // con.close();

        // System.out.println("data selected successfully");
        // } else {
        // System.out.println("Database Connection failed");
        // }
        Bibliotheque bibliotheque = new Bibliotheque();
        bibliotheque.ajouter_livre();// recuperer tous les livres de la BDD
        new Interface_Appli(bibliotheque);
    }
}
