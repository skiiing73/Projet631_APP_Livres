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
    private List<Avis> avis;

    public Livre(int idLivre, String titre, String genre, String date_de_publication) {
        this.idLivre = idLivre;
        this.titre = titre;
        this.genre = genre;
        this.date_de_publication = date_de_publication;
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

    public void setAuteur(String auteur) {
        this.auteur = auteur;
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