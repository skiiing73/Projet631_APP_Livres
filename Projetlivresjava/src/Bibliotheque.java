import java.util.ArrayList;
import java.util.List;
import java.sql.*;

public class Bibliotheque {
    private List<Livre> livres;
    private List<Editeur> editeurs;
    private List<Auteur> auteurs;

    public Bibliotheque() throws Exception {
        livres = new ArrayList<Livre>();
        editeurs = new ArrayList<Editeur>();
        auteurs = new ArrayList<Auteur>();
        this.maj_bliblitotheque();
        this.maj_editeurs();
        this.maj_auteurs();
    }

    public void maj_bliblitotheque() throws Exception {
        livres = new ArrayList<Livre>();
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
            int id_editeur = res.getInt(5);

            Livre new_livre = new Livre(nom_livre, genre, date_de_publication, id_editeur);

            if (!livres.contains(new_livre)) {
                livres.add(new_livre);
            }
        }
        con.close();
    }

    public void maj_editeurs() throws Exception {
        Connection con = DriverManager.getConnection(Config.url, Config.user, Config.password);

        Class.forName("com.mysql.cj.log.Slf4JLogger");

        // étape 3: créer l'objet statement
        Statement stmt = con.createStatement();
        ResultSet res = stmt.executeQuery("SELECT * FROM editeur");
        // étape 4: exécuter la requête
        while (res.next()) {
            int id_editeur = res.getInt(1);
            String nom_editeur = res.getString(2);
            Editeur editeur = new Editeur(id_editeur, nom_editeur);
            editeurs.add(editeur);

        }
        con.close();

    }

    public void maj_auteurs() throws Exception {
        Connection con = DriverManager.getConnection(Config.url, Config.user, Config.password);

        Class.forName("com.mysql.cj.log.Slf4JLogger");

        // étape 3: créer l'objet statement
        Statement stmt = con.createStatement();
        ResultSet res = stmt.executeQuery("SELECT * FROM auteur");
        // étape 4: exécuter la requête
        while (res.next()) {
            int id_auteur = res.getInt(1);
            String nom_auteur = res.getString(2);
            Auteur auteur = new Auteur(id_auteur, nom_auteur);
            auteurs.add(auteur);

        }
        con.close();

    }

    public List<Editeur> getediteurs() {
        return editeurs;
    }

    public List<Auteur> getauteurs() {
        return auteurs;
    }

    public List<Livre> getlivres() {
        return livres;
    }
}
