public class Auteur {
    private int id_auteur;
    private String nom_auteur;

    public Auteur(int id_auteur, String nom_auteur) {
        this.id_auteur = id_auteur;
        this.nom_auteur = nom_auteur;
    }

    public int getId_auteur() {
        return id_auteur;
    }

    public void setId_auteur(int id_auteur) {
        this.id_auteur = id_auteur;
    }

    public String getNom_auteur() {
        return nom_auteur;
    }

    public void setNom_auteur(String nom_auteur) {
        this.nom_auteur = nom_auteur;
    }

}