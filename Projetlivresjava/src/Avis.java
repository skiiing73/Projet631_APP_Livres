import java.util.Date;

// Classe Avis
public class Avis {
    private int idAvis;
    private int idUtilisateur;
    private int idLivre;
    private int note;
    private String commentaire;
    private Date dateAvis;

    public Avis(int idAvis, int idUtilisateur, int idLivre, int note, String commentaire, Date dateAvis) {
        this.idAvis = idAvis;
        this.idUtilisateur = idUtilisateur;
        this.idLivre = idLivre;
        this.note = note;
        this.commentaire = commentaire;
        this.dateAvis = dateAvis;
    }

    public int getIdAvis() {
        return idAvis;
    }

    public void setIdAvis(int idAvis) {
        this.idAvis = idAvis;
    }

    public int getIdUtilisateur() {
        return idUtilisateur;
    }

    public void setIdUtilisateur(int idUtilisateur) {
        this.idUtilisateur = idUtilisateur;
    }

    public int getIdLivre() {
        return idLivre;
    }

    public void setIdLivre(int idLivre) {
        this.idLivre = idLivre;
    }

    public int getNote() {
        return note;
    }

    public void setNote(int note) {
        this.note = note;
    }

    public String getCommentaire() {
        return commentaire;
    }

    public void setCommentaire(String commentaire) {
        this.commentaire = commentaire;
    }

    public Date getDateAvis() {
        return dateAvis;
    }

    public void setDateAvis(Date dateAvis) {
        this.dateAvis = dateAvis;
    }

}
