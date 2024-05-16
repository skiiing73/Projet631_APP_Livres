import javax.swing.*;
import java.awt.*;
import java.util.ArrayList;
import java.util.List;

public class Interface_Appli extends JFrame {
    private Bibliotheque bibliotheque;

    public Interface_Appli(Bibliotheque bibliotheque) {
        super("Gestion Livres");
        this.bibliotheque = bibliotheque;
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLayout(new GridLayout(3, 0)); // Utilisation d'un BorderLayout pour mieux organiser les composants
        getContentPane().setBackground(Color.LIGHT_GRAY);
        setSize(800, 800);
        setVisible(true);

        // Message de bienvenue en haut
        JLabel welcomeLabel = new JLabel("Bienvenue sur la page de gestion des Livres", SwingConstants.CENTER);
        add(welcomeLabel);

        JPanel liste_livres = new JPanel();
        liste_livres.setLayout(new BorderLayout());
        JLabel nomliste = new JLabel("Voici la liste de tous les livres");
        liste_livres.add(nomliste, BorderLayout.NORTH);
        // Création de la liste de livres
        DefaultListModel<String> listModel = new DefaultListModel<>();
        for (Livre livre : bibliotheque.getlivres()) {
            listModel.addElement(livre.getTitre() + "   " + livre.getGenre() + "    " + livre.getAnneePublication());
        }
        JList<String> livreList = new JList<>(listModel);
        JScrollPane scrollPane = new JScrollPane(livreList);
        liste_livres.add(scrollPane, BorderLayout.CENTER);

        add(liste_livres);
    }

    public static void main(String[] args) throws Exception {
        Bibliotheque bibliotheque = new Bibliotheque();
        SwingUtilities.invokeLater(() -> new Interface_Appli(bibliotheque));
    }
}
