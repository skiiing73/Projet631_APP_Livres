import javax.swing.*;
import javax.swing.border.Border;
import javax.swing.border.EmptyBorder;

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
        setLayout(new GridBagLayout()); 
        getContentPane().setBackground(Color.LIGHT_GRAY);
        setSize(800, 700);
        GridBagConstraints gbc = new GridBagConstraints();
        setVisible(true);
        // Zone définition couleur
        Color gris_texte = new Color(200, 200, 200);
        Color gris_bg = new Color(51, 51, 51);
        Color gris_fonce_bg = new Color(32, 32, 32);
        Color gris_clair_bg = new Color(150, 150, 150);
        Color rose_bouton = new Color(255, 51, 102);
        // Message de bienvenue en haut
        JPanel welcomePanel = new JPanel();
        JLabel welcomeLabel = new JLabel("Bienvenue sur la page de gestion des Livres", SwingConstants.CENTER);
        welcomeLabel.setFont(new Font("Arial", Font.BOLD, 24));
        welcomeLabel.setForeground(gris_texte);
        welcomeLabel.setBorder(new EmptyBorder(20, 0, 20, 0));
        
        welcomePanel.setAlignmentY(Component.CENTER_ALIGNMENT);
        welcomePanel.setLayout(new FlowLayout(FlowLayout.CENTER));
        welcomePanel.setBackground(gris_fonce_bg);
        welcomePanel.add(welcomeLabel);
        gbc.gridx = 0;
        gbc.gridy = 0;
        gbc.weightx = 1;
        gbc.weighty = 0;
        gbc.fill = GridBagConstraints.HORIZONTAL; // Remplit horizontalement
        add(welcomePanel,gbc);

        JPanel liste_livres = new JPanel();
        liste_livres.setLayout(new BorderLayout());
        JLabel nomliste = new JLabel("Voici la liste de tous les livres");
        nomliste.setFont(new Font("Arial", Font.BOLD, 16));
        nomliste.setForeground(gris_texte);
        nomliste.setBorder(new EmptyBorder(10, 10, 10, 0));
        liste_livres.add(nomliste, BorderLayout.NORTH);
        // Création de la liste de livres
        DefaultListModel<String> listModel = new DefaultListModel<>();
        for (Livre livre : bibliotheque.getlivres()) {
            listModel.addElement(livre.getTitre() + "   " + livre.getGenre() + "    " + livre.getdate_de_publication());
        }
        JList<String> livreList = new JList<>(listModel);
        livreList.setBorder(new EmptyBorder(0, 5, 0, 0));
        livreList.setBackground(gris_clair_bg);
        livreList.setFont(new Font("Arial", Font.BOLD, 12));
        livreList.setForeground(Color.WHITE);
        JScrollPane scrollPane = new JScrollPane(livreList);
        scrollPane.setBackground(gris_bg);
        liste_livres.add(scrollPane);
        liste_livres.setBackground(gris_bg);

        // Définition du layout du panel
        JPanel panel_bouton = new JPanel();
        panel_bouton.setLayout(new GridBagLayout());
        JPanel panelbouton = new JPanel();
        panelbouton.setLayout(new GridLayout(1,3)); // 3 lignes et 2 colonnes

        // Initialisation des boutons
        JButton button1 = new JButton("Ajouter un livre");
        JButton button2 = new JButton("Supprimer un livre");
        JButton button3 = new JButton("Gerer les avis");
        button1.setBackground(rose_bouton);
        button1.setForeground(Color.WHITE);
        button1.setFont(new Font("Arial", Font.BOLD, 16));
        button2.setBackground(rose_bouton);
        button2.setForeground(Color.WHITE);
        button2.setFont(new Font("Arial", Font.BOLD, 16));
        button3.setBackground(rose_bouton);
        button3.setForeground(Color.WHITE);
        button3.setFont(new Font("Arial", Font.BOLD, 16));
        JPanel remplissage_haut = new JPanel();
        remplissage_haut.setBackground(gris_bg);
        remplissage_haut.setBorder(new EmptyBorder(10, 0, 0, 0));
        JPanel remplissage_bas = new JPanel();
        remplissage_bas.setBackground(gris_bg);
        remplissage_bas.setBorder(new EmptyBorder(0, 0, 20, 0));
        // Ajout des composants au panel
        panelbouton.add(button1);
        panelbouton.add(button2);
        panelbouton.add(button3);
        gbc.gridx = 1;
        gbc.gridy = 1;
        panel_bouton.add(remplissage_haut, gbc);
        gbc.gridy = 2;
        panel_bouton.add(panelbouton, gbc);
        gbc.gridy = 3;
        panel_bouton.add(remplissage_bas, gbc);

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
        gbc.gridx = 0;
        gbc.gridy = 1;
        gbc.weightx = 1;
        gbc.weighty = 1;
        gbc.fill = GridBagConstraints.BOTH; // Remplit dans les deux sens
        add(liste_livres, gbc);
        gbc.gridx = 0;
        gbc.gridy = 2;
        gbc.weightx = 1;
        gbc.weighty = 0;
        gbc.fill = GridBagConstraints.HORIZONTAL; // Remplit horizontalement
        add(panel_bouton,gbc);

    }

    public void page_ajouter() {
        setVisible(false);
    }

    public static void main(String[] args) throws Exception {
        Bibliotheque bibliotheque = new Bibliotheque();
        SwingUtilities.invokeLater(() -> new Interface_Appli(bibliotheque));
    }
}
