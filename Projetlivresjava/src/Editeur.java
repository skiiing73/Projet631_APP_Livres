public class Editeur {
    private int id_editeur;
    private String nom_editeur;

    public Editeur(int id_editeur, String nom_editeur) {
        this.id_editeur = id_editeur;
        this.nom_editeur = nom_editeur;
    }

    public int getId_editeur() {
        return id_editeur;
    }

    public void setId_editeur(int id_editeur) {
        this.id_editeur = id_editeur;
    }

    public String getNom_editeur() {
        return nom_editeur;
    }

    public void setNom_editeur(String nom_editeur) {
        this.nom_editeur = nom_editeur;
    }

}
