import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.sql.*;

// Classe Livre
public class Livre {
    private int idLivre;
    private String titre;
    private String auteur;
    private String genre;
    private String date_de_publication;
    private int id_editeur;
    private List<Avis> avis;

    public Livre(int idLivre, String titre, String genre, String date_de_publication, int id_editeur) {
        this.idLivre = idLivre;
        this.titre = titre;
        this.genre = genre;
        this.date_de_publication = date_de_publication;
        this.id_editeur = id_editeur;
        avis = new ArrayList<>();
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
        ResultSet res = stmt.executeQuery("SELECT nom_auteur FROM auteur");
        while (res.next()) {
            String nom_auteur_BDD = res.getString(1);
            if (nom_auteur_BDD.equals(nom_auteur)) {
                this.auteur = nom_auteur;
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

    public void ajouter_livre_BDD() {
        // méthode qd la bdd marchera
    }

    public void supprimer_livre_BDD() throws Exception {
        Connection con = DriverManager.getConnection(Config.url, Config.user, Config.password);

        Class.forName("com.mysql.cj.log.Slf4JLogger");

        // étape 3: créer l'objet statement
        Statement stmt = con.createStatement();
        ResultSet res = stmt.executeQuery(
                "DELETE FROM livre\r\n" + "WHERE titre =" + this.titre + "AND date_de_publication="
                        + this.date_de_publication + ";");

    }

    public List<Avis> getAvis() {
        return avis;
    }

    public void setAvis(List<Avis> avis) {
        this.avis = avis;
        // ajouter la BDD
    }

    public List<Avis> listerAvis() {
        return avis;
    }

}