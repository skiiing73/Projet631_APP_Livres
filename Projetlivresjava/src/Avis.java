import java.sql.*;

// Classe Avis
public class Avis {
    private int idAvis;
    private int idUtilisateur;
    private int idLivre;
    private int note;
    private String commentaire;

    public Avis(int idAvis, int idUtilisateur, int idLivre, int note, String commentaire) {
        this.idAvis = idAvis;
        this.idUtilisateur = idUtilisateur;
        this.idLivre = idLivre;
        this.note = note;
        this.commentaire = commentaire;
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

    public void supprimer() throws Exception {
        Connection con = DriverManager.getConnection(Config.url, Config.user, Config.password);

        Class.forName("com.mysql.cj.log.Slf4JLogger");

        // étape 3: créer l'objet statement
        Statement stmt = con.createStatement();
        int res = stmt.executeUpdate("DELETE FROM avis WHERE id_avis =" + this.idAvis);
    }
}
