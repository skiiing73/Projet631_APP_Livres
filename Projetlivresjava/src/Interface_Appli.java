import javax.swing.*;

import javax.swing.border.EmptyBorder;
import javax.swing.event.ListSelectionEvent;
import javax.swing.event.ListSelectionListener;

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.*;

public class Interface_Appli extends JFrame {
    private Bibliotheque bibliotheque;
    private Livre selectedBook;
    // Zone définition couleur
    private Color gris_texte = new Color(200, 200, 200);
    private Color gris_bg = new Color(51, 51, 51);
    private Color gris_fonce_bg = new Color(32, 32, 32);
    private Color gris_clair_bg = new Color(150, 150, 150);
    private Color rose_bouton = new Color(255, 51, 102);

    public Interface_Appli(Bibliotheque bibliotheque) {
        super("Gestion Livres");
        this.bibliotheque = bibliotheque;
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLayout(new GridBagLayout());
        getContentPane().setBackground(Color.LIGHT_GRAY);
        setSize(800, 700);
        GridBagConstraints gbc = new GridBagConstraints();
        setVisible(true);
        setLocationRelativeTo(null);

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
        add(welcomePanel, gbc);

        JPanel liste_livres = new JPanel();
        liste_livres.setLayout(new BorderLayout());
        JLabel nomliste = new JLabel("Voici la liste de tous les livres");
        nomliste.setFont(new Font("Arial", Font.BOLD, 16));
        nomliste.setForeground(gris_texte);
        nomliste.setBorder(new EmptyBorder(10, 10, 0, 10));
        liste_livres.add(nomliste, BorderLayout.NORTH);
        // Création de la liste de livres
        DefaultListModel<String> listModel = new DefaultListModel<>();
        for (Livre livre : bibliotheque.getlivres()) {
            listModel.addElement(livre.getTitre() + "   " + livre.getGenre() + "    " + livre.getdate_de_publication());
        }
        JList<String> livreList = new JList<>(listModel);

        livreList.setFont(new Font("Arial", Font.BOLD, 12));
        JScrollPane scrollPane = new JScrollPane(livreList);
        scrollPane.setBorder(new EmptyBorder(10, 5, 10, 5));
        scrollPane.setBackground(gris_bg);
        liste_livres.add(scrollPane);
        liste_livres.setBackground(gris_bg);

        // Définition du layout du panel
        JPanel panel_bouton = new JPanel();
        panel_bouton.setLayout(new GridBagLayout());
        JPanel panelbouton = new JPanel();
        panelbouton.setLayout(new GridLayout(1, 3)); // 3 lignes et 2 colonnes

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

        // Ajouter un écouteur de sélection à la liste de livres
        livreList.addListSelectionListener(new ListSelectionListener() {
            public void valueChanged(ListSelectionEvent event) {
                if (!event.getValueIsAdjusting()) {
                    // Obtenir l'indice de l'élément sélectionné
                    int selectedIndex = livreList.getSelectedIndex();
                    if (selectedIndex != -1) { // Vérifier si un élément est sélectionné
                        // Obtenir le Livre sélectionné
                        selectedBook = bibliotheque.getlivres().get(selectedIndex);
                    }
                }
            }
        });

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
                try {
                    selectedBook.supprimer_livre_BDD();
                    JOptionPane.showMessageDialog(null, "Livre supprimé avec succès");
                    bibliotheque.maj_bliblitotheque();
                    listModel.clear(); // Efface les éléments actuels du modèle
                    for (Livre livre : bibliotheque.getlivres()) {
                        listModel.addElement(
                                livre.getTitre() + "   " + livre.getGenre() + "    " + livre.getdate_de_publication());
                    }

                } catch (Exception e1) {
                    JOptionPane.showMessageDialog(null, "Veuillez selectioner un livre");
                    e1.printStackTrace();
                }
            }
        });

        button3.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                page_avis();
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
        add(panel_bouton, gbc);

    }

    public void page_ajouter() {
        setVisible(false);
        JFrame pagejouterlivre = new JFrame();
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        pagejouterlivre.setLayout(new GridLayout(3, 0)); // Utilisation d'un BorderLayout pour mieux organiser les
                                                         // composants
        pagejouterlivre.getContentPane().setBackground(gris_fonce_bg);
        pagejouterlivre.setSize(800, 700);
        pagejouterlivre.setVisible(true);
        pagejouterlivre.setLocationRelativeTo(null);

        // Message de bienvenue en haut
        JLabel welcomeLabel = new JLabel("Bienvenue sur la page d'ajout de livres", SwingConstants.CENTER);
        welcomeLabel.setForeground(gris_texte);
        welcomeLabel.setFont(new Font("Arial", Font.BOLD, 24));
        pagejouterlivre.add(welcomeLabel);

        // Panel de création d'un livre
        JPanel panelCreation = new JPanel();
        panelCreation.setBackground(gris_clair_bg);
        panelCreation.setBorder(new EmptyBorder(20, 5, 20, 5));
        panelCreation.setLayout(new GridLayout(6, 1)); // Utilisation d'un GridLayout pour organiser les composants

        JLabel creationtitreLabel = new JLabel("Titre du livre :");
        panelCreation.add(creationtitreLabel);
        JTextField creationtitreTextField = new JTextField(20);
        panelCreation.add(creationtitreTextField);

        JLabel creationgenreLabel = new JLabel("Genre / Catégorie :");
        panelCreation.add(creationgenreLabel);
        JTextField creationgenreTextField = new JTextField(20);
        panelCreation.add(creationgenreTextField);

        JLabel creationdateLabel = new JLabel("Date de parution (en YYYY-MM-DD):");
        panelCreation.add(creationdateLabel);
        JTextField creationdateTextField = new JTextField(20);
        panelCreation.add(creationdateTextField);

        JLabel creationauteurLabel = new JLabel("Auteur: (si vous voulez créer un auteur rentrez son nom seulement)");
        panelCreation.add(creationauteurLabel);
        JTextField creationauteurTextField = new JTextField(20);
        panelCreation.add(creationauteurTextField);

        JLabel creationediteurLabel = new JLabel("ID Editeur (parmi la liste uniquement):");
        panelCreation.add(creationediteurLabel);
        JTextField creationediteurTextField = new JTextField(20);
        panelCreation.add(creationediteurTextField);

        JButton creationButton = new JButton("Création du livre");
        creationButton.setBorder(new EmptyBorder(5, 5, 5, 5));
        creationButton.setBackground(rose_bouton);
        creationButton.setForeground(Color.WHITE);
        creationButton.setFont(new Font("Arial", Font.BOLD, 16));
        creationButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String titre = creationtitreTextField.getText();
                String genre = creationgenreTextField.getText();
                String date = creationdateTextField.getText();
                String idediteur = creationediteurTextField.getText();
                if (!titre.isEmpty() & !genre.isEmpty() & !date.isEmpty() & !idediteur.isEmpty()) {

                    Livre livre = new Livre(titre, genre, date, Integer.parseInt(idediteur));
                    try {// obligatoire car sinon bug a cause de la bdd
                        String nom_auteur = creationauteurTextField.getText();

                        if (livre.getAuteur() != null) {// on assigne l'auteur au livre
                            livre.ajouter_livre_BDD();// on ajoute le livre dans la BDD
                            JOptionPane.showMessageDialog(null, "Livre ajouté dans la BDD");

                        } else {// si l'auteur na pas été affecté il faut le créer dans la BDD
                            JOptionPane.showMessageDialog(null, "Erreur l'auteur n'existe pas veuillez le créér");

                            nom_auteur = creer_auteur(nom_auteur, livre);

                        }

                    } catch (Exception e1) {
                        // TODO Auto-generated catch block
                        e1.printStackTrace();
                    }
                } else {
                    JOptionPane.showMessageDialog(null, "Veuillez remplir tous les champs");
                }

            }

        });

        JButton homeButton = new JButton("Revenir a l'accueil");
        homeButton.setBorder(new EmptyBorder(5, 5, 5, 5));
        homeButton.setBackground(rose_bouton);
        homeButton.setForeground(Color.WHITE);
        homeButton.setFont(new Font("Arial", Font.BOLD, 16));
        homeButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {

                try {
                    bibliotheque.maj_bliblitotheque();
                    setVisible(true);
                    pagejouterlivre.dispose();
                } catch (Exception e1) {

                    e1.printStackTrace();
                }

            }

        });
        panelCreation.add(homeButton);
        panelCreation.add(creationButton);
        pagejouterlivre.add(panelCreation);

        // panel avec la liste des éditeurs
        JPanel panel_auteur_editeur = new JPanel(new GridLayout(1, 0));
        JPanel liste_editeur = new JPanel();
        liste_editeur.setLayout(new BorderLayout());
        liste_editeur.setBackground(gris_bg);
        JLabel nomliste = new JLabel("Voici la liste de tous les editeurs");
        nomliste.setBorder(new EmptyBorder(5, 10, 10, 10));
        nomliste.setFont(new Font("Arial", Font.BOLD, 16));
        nomliste.setForeground(gris_texte);
        liste_editeur.add(nomliste, BorderLayout.NORTH);
        // Création de la liste de editeur
        DefaultListModel<String> listModelediteur = new DefaultListModel<>();
        for (Editeur editeur : bibliotheque.getediteurs()) {
            listModelediteur.addElement(editeur.getNom_editeur() + " (ID= " + editeur.getId_editeur() + ")");
        }
        JList<String> editeurList = new JList<>(listModelediteur);
        JScrollPane scrollPane_editeur = new JScrollPane(editeurList);
        scrollPane_editeur.setBorder(new EmptyBorder(5, 10, 10, 10));
        liste_editeur.add(scrollPane_editeur, BorderLayout.CENTER);
        panel_auteur_editeur.add(liste_editeur);

        // panel avec la liste des auteurs
        JPanel liste_auteur = new JPanel();
        liste_auteur.setLayout(new BorderLayout());
        liste_auteur.setBackground(gris_bg);
        JLabel nomlisteauteur = new JLabel("Voici la liste de tous les auteurs");
        nomlisteauteur.setBorder(new EmptyBorder(5, 10, 10, 10));
        nomlisteauteur.setFont(new Font("Arial", Font.BOLD, 16));
        nomlisteauteur.setForeground(gris_texte);
        liste_auteur.add(nomlisteauteur, BorderLayout.NORTH);
        // Création de la liste de auteur
        DefaultListModel<String> listModelauteur = new DefaultListModel<>();
        for (Auteur auteur : bibliotheque.getauteurs()) {
            listModelauteur.addElement(auteur.getNom_auteur());
        }
        JList<String> auteurList = new JList<>(listModelauteur);
        JScrollPane scrollPaneauteur = new JScrollPane(auteurList);
        scrollPaneauteur.setBorder(new EmptyBorder(5, 10, 10, 10));
        liste_auteur.add(scrollPaneauteur, BorderLayout.CENTER);
        panel_auteur_editeur.add(liste_auteur);

        pagejouterlivre.add(panel_auteur_editeur);
    }

    public String creer_auteur(String nom_auteur, Livre livre) throws Exception {
        JFrame pagejouterauteur = new JFrame();
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        pagejouterauteur.setLayout(new GridLayout(3, 0)); // Utilisation d'un BorderLayout pour mieux organiser les
                                                          // composants
        pagejouterauteur.getContentPane().setBackground(gris_fonce_bg);
        pagejouterauteur.setLocationRelativeTo(null);
        pagejouterauteur.setSize(500, 500);
        pagejouterauteur.setVisible(true);

        // Message de bienvenue en haut
        JLabel welcomeLabel = new JLabel("Bienvenue sur la page de création d'auteur", SwingConstants.CENTER);
        welcomeLabel.setForeground(gris_texte);
        welcomeLabel.setFont(new Font("Arial", Font.BOLD, 18));
        pagejouterauteur.add(welcomeLabel);
        welcomeLabel.setBorder(new EmptyBorder(0, 5, 0, 5));

        // Panel de création d'un livre
        JPanel panelCreation = new JPanel();
        panelCreation.setBorder(new EmptyBorder(20, 20, 5, 20));
        panelCreation.setBackground(gris_clair_bg);
        panelCreation.setLayout(new GridLayout(5, 1)); // Utilisation d'un GridLayout pour organiser les composants

        JLabel creationnomauteurLabel = new JLabel("Nom de l'auteur :");
        panelCreation.add(creationnomauteurLabel);
        JTextField creationnomauteurTextField = new JTextField(nom_auteur, 20);
        panelCreation.add(creationnomauteurTextField);

        JLabel creationprenomauteurLabel = new JLabel("Prenom de l'auteur :");
        panelCreation.add(creationprenomauteurLabel);
        JTextField creationprenomauteurTextField = new JTextField(20);
        panelCreation.add(creationprenomauteurTextField);

        JLabel creationdatenaissanceLabel = new JLabel("Date de naissance (en YYYY-MM-DD):");
        panelCreation.add(creationdatenaissanceLabel);
        JTextField creationdatenaissanceTextField = new JTextField(20);
        panelCreation.add(creationdatenaissanceTextField);

        JLabel creationdatemortLabel = new JLabel("Date de mort (en YYYY-MM-DD):");
        panelCreation.add(creationdatemortLabel);
        JTextField creationdatemortTextField = new JTextField(20);
        panelCreation.add(creationdatemortTextField);

        JPanel panelButton = new JPanel(new GridLayout());
        JButton creationButton = new JButton("Création de l'auteur");
        creationButton.setBackground(rose_bouton);
        creationButton.setForeground(Color.WHITE);
        creationButton.setFont(new Font("Arial", Font.BOLD, 16));
        panelButton.setBorder(new EmptyBorder(5, 0, 0, 0));
        panelButton.setBackground(gris_clair_bg);
        creationButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String nom_auteur = creationnomauteurTextField.getText();
                String prenom_auteur = creationprenomauteurTextField.getText();
                String datenaissance = creationdatenaissanceTextField.getText();
                String datemort = creationdatemortTextField.getText();
                if (!nom_auteur.isEmpty() & !prenom_auteur.isEmpty() & !datenaissance.isEmpty() & !datemort.isEmpty()) {
                    try (Connection con = DriverManager.getConnection(Config.url, Config.user, Config.password)) {
                        Class.forName("com.mysql.cj.log.Slf4JLogger");

                        Statement stmt = con.createStatement();
                        int res = stmt.executeUpdate(
                                "Insert into auteur (nom_auteur,prenom_auteur,date_de_naissance,date_de_mort) VALUES('"
                                        + nom_auteur + "','" + prenom_auteur + "','" + datenaissance + "','" + datemort
                                        + "');");
                        pagejouterauteur.dispose();
                        JOptionPane.showMessageDialog(null, "Auteur ajouté dans la BDD");
                        livre.setAuteur(nom_auteur);
                        livre.ajouter_livre_BDD();// on ajoute le livre dans la BDD
                        JOptionPane.showMessageDialog(null, "Livre ajouté dans la BDD");
                    } catch (Exception e2) {
                        // TODO Auto-generated catch block
                        e2.printStackTrace();

                    }
                } else {
                    JOptionPane.showMessageDialog(null, "Veuillez remplir tous les champs");
                }
            }
        });
        panelButton.add(creationButton);
        panelCreation.add(panelButton);
        pagejouterauteur.add(panelCreation);

        ImageIcon imageIcon = new ImageIcon("image_auteur.png");
        JLabel imageLabel = new JLabel(imageIcon);
        pagejouterauteur.add(imageLabel);
        return nom_auteur;
    }

    public void page_avis() {
        this.setVisible(false);
        JFrame pageAvis = new JFrame();
        pageAvis.setTitle("Page des Avis");
        pageAvis.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        pageAvis.setSize(800, 700);
        pageAvis.setLocationRelativeTo(null);
        pageAvis.getContentPane().setBackground(gris_fonce_bg);
        pageAvis.setLayout(new BorderLayout());

        // Message de bienvenue en haut
        JLabel welcomeLabel = new JLabel("Bienvenue sur la page de gestion des avis", SwingConstants.CENTER);
        welcomeLabel.setBorder(new EmptyBorder(20, 15, 20, 15));
        welcomeLabel.setForeground(gris_texte);
        welcomeLabel.setFont(new Font("Arial", Font.BOLD, 20));
        pageAvis.add(welcomeLabel, BorderLayout.NORTH);

        // Panel avec les livres et les Avis
        JPanel panelLivreAvis = new JPanel(new GridLayout(1, 0));
        panelLivreAvis.setBackground(gris_bg);
        panelLivreAvis.setBorder(new EmptyBorder(15, 15, 15, 15));
        // Panel pour la sélection des livres
        JPanel panelLivre = new JPanel();
        panelLivre.setBackground(gris_bg);
        panelLivre.setLayout(new BorderLayout());

        JLabel livreLabel = new JLabel("Sélectionnez un livre:");
        livreLabel.setFont(new Font("Arial", Font.BOLD, 16));
        livreLabel.setForeground(gris_texte);
        panelLivre.add(livreLabel, BorderLayout.NORTH);

        DefaultListModel<String> livreListModel = new DefaultListModel<>();
        for (Livre livre : bibliotheque.getlivres()) {
            livreListModel.addElement(livre.getTitre() + "   ");
        }
        JList<String> livreList = new JList<>(livreListModel);
        livreList.setSelectionMode(ListSelectionModel.SINGLE_SELECTION);
        JScrollPane livreScrollPane = new JScrollPane(livreList);
        panelLivre.add(livreScrollPane, BorderLayout.CENTER);

        // Panel pour afficher les avis
        JPanel panelAvis = new JPanel();
        panelAvis.setLayout(new BorderLayout());
        panelAvis.setBackground(gris_bg);

        JLabel AvisLabel = new JLabel("Sélectionnez un avis du livre: ");
        AvisLabel.setFont(new Font("Arial", Font.BOLD, 16));
        AvisLabel.setForeground(gris_texte);
        panelAvis.add(AvisLabel, BorderLayout.NORTH);

        DefaultListModel<String> avisListModel = new DefaultListModel<>();
        JList<String> avisList = new JList<>(avisListModel);
        avisList.setSelectionMode(ListSelectionModel.SINGLE_SELECTION);
        JScrollPane avisScrollPane = new JScrollPane(avisList);
        panelAvis.add(avisScrollPane, BorderLayout.CENTER);

        // ajout des deux panel au panel qui contient livre et avis
        panelLivreAvis.add(panelLivre);
        panelLivreAvis.add(panelAvis);

        // ajout du panel avec les list a la page
        pageAvis.add(panelLivreAvis, BorderLayout.CENTER);

        // Panel du bas pour le bouton de suppression
        JPanel Panelbouton = new JPanel();
        Panelbouton.setBorder(new EmptyBorder(10, 15, 15, 15));
        Panelbouton.setBackground(gris_bg);

        JButton supprimerButton = new JButton("Supprimer Avis");
        supprimerButton.setBackground(rose_bouton);
        supprimerButton.setForeground(Color.WHITE);
        supprimerButton.setFont(new Font("Arial", Font.BOLD, 16));

        // Listener pour la sélection d'un livre
        livreList.addListSelectionListener(new ListSelectionListener() {
            @Override
            public void valueChanged(ListSelectionEvent e) {
                if (!e.getValueIsAdjusting()) {
                    int selectedIndex = livreList.getSelectedIndex();
                    if (selectedIndex != -1) {
                        String selectedLivreInfo = livreListModel.get(selectedIndex);
                        String selectedLivreTitre = selectedLivreInfo.split("   ")[0];
                        Livre selectedLivre = bibliotheque.getlivres().stream()
                                .filter(livre -> livre.getTitre().equals(selectedLivreTitre))
                                .findFirst()
                                .orElse(null);

                        if (selectedLivre != null) {
                            avisListModel.clear();
                            try {
                                for (Avis avis : selectedLivre.getAvis()) {
                                    avisListModel.addElement(avis.getCommentaire());
                                }
                            } catch (Exception e1) {
                                e1.printStackTrace();
                            }
                        }
                    }
                }
            }
        });
        // Listener pour le bouton de suppression
        supprimerButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                Avis avisASupprimer;
                int selectedAvisIndex = avisList.getSelectedIndex();
                if (selectedAvisIndex != -1) {
                    String selectedAvisContent = avisListModel.get(selectedAvisIndex);
                    int selectedLivreIndex = livreList.getSelectedIndex();
                    if (selectedLivreIndex != -1) {
                        String selectedLivreInfo = livreListModel.get(selectedLivreIndex);
                        String selectedLivreTitre = selectedLivreInfo.split("   ")[0];
                        Livre selectedLivre = bibliotheque.getlivres().stream()
                                .filter(livre -> livre.getTitre().equals(selectedLivreTitre))
                                .findFirst()
                                .orElse(null);

                        if (selectedLivre != null) {
                            try {
                                avisASupprimer = selectedLivre.getAvis().stream()
                                        .filter(avis -> avis.getCommentaire().equals(selectedAvisContent))
                                        .findFirst()
                                        .orElse(null);
                                if (avisASupprimer != null) {
                                    avisASupprimer.supprimer();
                                    JOptionPane.showMessageDialog(null, "L'avis a bien été supprimer.");
                                    avisListModel.remove(selectedAvisIndex);
                                }
                            } catch (Exception e1) {
                                e1.printStackTrace();
                            }
                        }
                    }
                } else {
                    JOptionPane.showMessageDialog(null, "Veuillez sélectionner un avis à supprimer.",
                            "Erreur",
                            JOptionPane.ERROR_MESSAGE);
                }
            }
        });
        JButton homeButton = new JButton("Revenir a l'accueil");
        homeButton.setBorder(new EmptyBorder(5, 5, 5, 5));
        homeButton.setBackground(rose_bouton);
        homeButton.setForeground(Color.WHITE);
        homeButton.setFont(new Font("Arial", Font.BOLD, 16));
        homeButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {

                try {
                    bibliotheque.maj_bliblitotheque();
                    setVisible(true);
                    pageAvis.dispose();
                } catch (Exception e1) {

                    e1.printStackTrace();
                }

            }

        });

        Panelbouton.add(homeButton);
        Panelbouton.add(supprimerButton);
        pageAvis.add(Panelbouton, BorderLayout.SOUTH);
        pageAvis.setVisible(true);
    }

    public static void main(String[] args) throws Exception {
        Bibliotheque bibliotheque = new Bibliotheque();
        SwingUtilities.invokeLater(() -> new Interface_Appli(bibliotheque));

    }
}
