import java.util.ArrayList;
import java.util.Date;
import java.util.List;

// Classe Livre
public class Livre {
    private int idLivre;
    private String titre;
    private String auteur;
    private String genre;
    private String anneePublication;
    private List<Avis> avis;

    public Livre(int idLivre, String titre, String genre, String anneePublication) {
        this.idLivre = idLivre;
        this.titre = titre;
        this.genre = genre;
        this.anneePublication = anneePublication;
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

    public String getAnneePublication() {
        return anneePublication;
    }

    public void setAnneePublication(String anneePublication) {
        this.anneePublication = anneePublication;
    }

    public void ajouter_livre_BDD() {
        // méthode qd la bdd marchera
    }

    public void supprimer_livre_BDD() {
        // methode quand la BDD marchera
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