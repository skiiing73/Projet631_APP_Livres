import java.util.ArrayList;
import java.util.List;

public class Bibliotheque {
    private List<Livre> livres;

    public Bibliotheque() {
        livres = new ArrayList<Livre>();
    }

    public void ajouter_livre() {
        // recupere tous les livres de la BDD
    }

    public List<Livre> getlivres() {
        return livres;
    }
}
