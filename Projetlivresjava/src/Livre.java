import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.sql.*;

// Classe Livre
public class Livre {
    private int idLivre;
    private String titre;
    private String auteur;
    private int id_auteur;
    private String genre;
    private String date_de_publication;
    private int id_editeur;
    private List<Avis> avis;

    public Livre(String titre, String genre, String date_de_publication, int id_editeur) {
        this.titre = titre;
        this.genre = genre;
        this.date_de_publication = date_de_publication;
        this.id_editeur = id_editeur;
        avis = new ArrayList<>();
    }

    public void setId_auteur(int id_auteur) {
        this.id_auteur = id_auteur;
    }

    public int getIdLivre() {
        return idLivre;
    }

    public void setIdLivre(int idLivre) {
        this.idLivre = idLivre;
    }

    public String getTitre() {
        return titre;
    }

    public void setTitre(String titre) {
        this.titre = titre;
    }

    public String getAuteur() {
        return auteur;
    }

    // cette fonction permet de définir un auteur.
    // si l'auteur existe deja on assigne juste sa valeur au livre sinon on assigne
    // sa valeur et on le crééer dans la BDD
    public boolean setAuteur(String nom_auteur) throws Exception {
        // connexion a la BDD voir si l'auteur existe
        Connection con = DriverManager.getConnection(Config.url, Config.user, Config.password);

        Class.forName("com.mysql.cj.log.Slf4JLogger");

        Statement stmt = con.createStatement();
        ResultSet res = stmt.executeQuery("SELECT id_auteur, nom_auteur FROM auteur");
        while (res.next()) {
            String nom_auteur_BDD = res.getString(2);
            int id_auteur_BDD = res.getInt(1);
            if (nom_auteur_BDD.equals(nom_auteur)) {
                this.auteur = nom_auteur;
                this.id_auteur = id_auteur_BDD;
                return true;
            }
        }
        return false;

    }

    public String getGenre() {
        return genre;
    }

    public void setGenre(String genre) {
        this.genre = genre;
    }

    public String getdate_de_publication() {
        return date_de_publication;
    }

    public void setdate_de_publication(String date_de_publication) {
        this.date_de_publication = date_de_publication;
    }

    public void ajouter_livre_BDD() throws Exception {
        Class.forName("com.mysql.cj.log.Slf4JLogger");
        Connection con = DriverManager.getConnection(Config.url, Config.user, Config.password);

        Statement stmt = con.createStatement();
        int res = stmt.executeUpdate(
                "Insert into livre (nom_livre,date_de_publication,genre,id_editeur) VALUES('"
                        + titre + "','" + date_de_publication + "','" + genre + "'," + id_editeur + ");");
        ResultSet rq_id_livre = stmt.executeQuery(
                "SELECT id_livre FROM livre WHERE nom_livre ='" + this.titre + "'AND date_de_publication='"
                        + this.date_de_publication + "';");

        int id_livre;
        if (rq_id_livre.next()) {
            id_livre = rq_id_livre.getInt(1);
        } else {
            throw new SQLException("Aucun ID de livre n'a été trouvé pour les données spécifiées.");
        }

        int res2 = stmt.executeUpdate(
                "Insert into ecrit (id_auteur,id_livre) VALUES("
                        + id_auteur + "," + id_livre + ");");
    }

    public void supprimer_livre_BDD() throws Exception {
        Connection con = DriverManager.getConnection(Config.url, Config.user, Config.password);

        Class.forName("com.mysql.cj.log.Slf4JLogger");

        // étape 3: créer l'objet statement
        Statement stmt = con.createStatement();
        ResultSet rq_id_livre = stmt.executeQuery(
                "SELECT id_livre FROM livre WHERE nom_livre ='" + this.titre + "'AND date_de_publication='"
                        + this.date_de_publication + "';");

        int id_livre;
        if (rq_id_livre.next()) {
            id_livre = rq_id_livre.getInt(1);
        } else {
            throw new SQLException("Aucun ID de livre n'a été trouvé pour les données spécifiées.");
        }

        int res = stmt.executeUpdate("DELETE FROM avis WHERE id_livre =" + id_livre);
        res = stmt.executeUpdate("DELETE FROM ecrit WHERE id_livre =" + id_livre);
        res = stmt.executeUpdate(" DELETE FROM livre WHERE nom_livre ='" + this.titre + "'AND date_de_publication='"
                + this.date_de_publication + "'");

    }

    public List<Avis> getAvis() throws Exception {
        avis = new ArrayList<>();
        Class.forName("com.mysql.cj.log.Slf4JLogger");
        Connection con = DriverManager.getConnection(Config.url, Config.user, Config.password);

        Statement stmt = con.createStatement();
        ResultSet res = stmt.executeQuery("SELECT * FROM avis WHERE id_livre =" + this.idLivre);
        while (res.next()) {
            int idAvis = res.getInt(1);
            int note = res.getInt(2);
            String commentaire = res.getString(3);
            int idUser = res.getInt(6);

            Avis new_avis = new Avis(idAvis, idUser, idLivre, note, commentaire);
            avis.add(new_avis);
        }
        return avis;
    }
}