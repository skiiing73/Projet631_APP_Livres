import java.util.ArrayList;
import java.util.List;
import java.sql.*;

public class Bibliotheque {
    private List<Livre> livres;

    public Bibliotheque() throws Exception {
        livres = new ArrayList<Livre>();
        this.ajouter_livre();
    }

    public void ajouter_livre() throws Exception {
        Connection con = DriverManager.getConnection(Config.url, Config.user, Config.password);

        Class.forName("com.mysql.cj.log.Slf4JLogger");

        // étape 3: créer l'objet statement
        Statement stmt = con.createStatement();
        ResultSet res = stmt.executeQuery("SELECT * FROM livre");
        // étape 4: exécuter la requête
        while (res.next()) {
            int idLivre = res.getInt(1);
            String nom_livre = res.getString(2);
            String date_de_publication = res.getString(3);
            String genre = res.getString(4);

            Livre new_livre = new Livre(idLivre, nom_livre, genre, date_de_publication);

            livres.add(new_livre);
        }
    }

    public List<Livre> getlivres() {
        return livres;
    }
}
