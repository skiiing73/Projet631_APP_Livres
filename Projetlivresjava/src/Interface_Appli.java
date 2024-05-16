import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
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
            listModel.addElement(livre.getTitre() + "   " + livre.getGenre() + "    " + livre.getdate_de_publication());
        }
        JList<String> livreList = new JList<>(listModel);
        JScrollPane scrollPane = new JScrollPane(livreList);
        liste_livres.add(scrollPane, BorderLayout.CENTER);

        // Définition du layout du panel
        JPanel panelbouton = new JPanel();
        panelbouton.setLayout(new GridLayout(3, 2)); // 3 lignes et 2 colonnes

        // Initialisation des boutons
        JButton button1 = new JButton("Bouton 1");
        JButton button2 = new JButton("Bouton 2");
        JButton button3 = new JButton("Bouton 3");

        // Initialisation des labels
        JLabel label1 = new JLabel("Définition du Bouton 1 :");
        JLabel label2 = new JLabel("Définition du Bouton 2 :");
        JLabel label3 = new JLabel("Définition du Bouton 3 :");

        // Ajout des composants au panel
        panelbouton.add(label1);
        panelbouton.add(button1);
        panelbouton.add(label2);
        panelbouton.add(button2);
        panelbouton.add(label3);
        panelbouton.add(button3);

        // Ajout des écouteurs d'événements aux boutons
        button1.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                page_ajouter();
            }
        });

        button2.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                // Traitement pour le bouton 2
                JOptionPane.showMessageDialog(null, "Vous avez cliqué sur le Bouton 2");
            }
        });

        button3.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                // Traitement pour le bouton 3
                JOptionPane.showMessageDialog(null, "Vous avez cliqué sur le Bouton 3");
            }
        });
        add(liste_livres);
        add(panelbouton);

    }

    public void page_ajouter() {
        setVisible(false);
    }

    public static void main(String[] args) throws Exception {
        Bibliotheque bibliotheque = new Bibliotheque();
        SwingUtilities.invokeLater(() -> new Interface_Appli(bibliotheque));
    }
}
