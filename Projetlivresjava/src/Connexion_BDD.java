import java.sql.*;

public class Connexion_BDD {
    public static void main(String[] args) {
        // Informations de connexion
        String url = "jdbc:mysql://projet-idu.hqbr.win/projet?useSSL=false";
        String user = "dev";
        String password = "8a*#Hk$2Fq@p&9z!";

        try (Connection con = DriverManager.getConnection(url, user, password)) {
            System.out.println("Connexion à la base de données réussie");
            // Étape 3: créer l'objet Statement
            try (Statement stmt = con.createStatement()) {
                ResultSet res = stmt.executeQuery("SELECT * FROM zone");
                // Étape 4: exécuter la requête
                while (res.next())
                    System.out.println(res.getInt(1) + "  " + res.getString(2)
                            + "  " + res.getString(3));
            }
            // Étape 5: fermer l'objet Connection (automatiquement grâce au
            // try-with-resources)
            System.out.println("Données sélectionnées avec succès");
        } catch (SQLException e) {
            System.out.println("Échec de la connexion à la base de données");
            e.printStackTrace();
        }
    }
}
