import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.*;
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
        setSize(800, 700);
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
        JButton button1 = new JButton("Ajouter un livre");
        JButton button2 = new JButton("Supprimer un livre");
        JButton button3 = new JButton("Gerer les avis");

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
        JFrame pagejouterlivre = new JFrame();
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        pagejouterlivre.setLayout(new GridLayout(3, 0)); // Utilisation d'un BorderLayout pour mieux organiser les
                                                         // composants
        pagejouterlivre.getContentPane().setBackground(Color.LIGHT_GRAY);
        pagejouterlivre.setSize(800, 700);
        pagejouterlivre.setVisible(true);

        // Message de bienvenue en haut
        JLabel welcomeLabel = new JLabel("Bienvenue sur la page d'ajout de livres", SwingConstants.CENTER);
        pagejouterlivre.add(welcomeLabel);

        // Panel de création d'un livre
        JPanel panelCreation = new JPanel();
        panelCreation.setBackground(Color.PINK);
        panelCreation.setLayout(new GridLayout(6, 1)); // Utilisation d'un GridLayout pour organiser les composants

        JLabel creationtitreLabel = new JLabel("Titre du livre :");
        panelCreation.add(creationtitreLabel);
        JTextField creationtitreTextField = new JTextField(20);
        panelCreation.add(creationtitreTextField);

        JLabel creationgenreLabel = new JLabel("Genre / Catégorie :");
        panelCreation.add(creationgenreLabel);
        JTextField creationgenreTextField = new JTextField(20);
        panelCreation.add(creationgenreTextField);

        JLabel creationdateLabel = new JLabel("Date de parution:");
        panelCreation.add(creationdateLabel);
        JTextField creationdateTextField = new JTextField(20);
        panelCreation.add(creationdateTextField);

        JLabel creationauteurLabel = new JLabel("Auteur:");
        panelCreation.add(creationauteurLabel);
        JTextField creationauteurTextField = new JTextField(20);
        panelCreation.add(creationauteurTextField);

        JLabel creationediteurLabel = new JLabel("Editeur (parmi la liste):");
        panelCreation.add(creationediteurLabel);
        JTextField creationediteurTextField = new JTextField(20);
        panelCreation.add(creationediteurTextField);

        JPanel panelcreationButton = new JPanel(new BorderLayout());
        JButton creationButton = new JButton("Création du livre");
        creationButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                for (Livre livre : bibliotheque.getlivres()) {// on cherche a quel livre de la bibliotheque ca
                                                              // correspond

                    try {// obligatoire car sinon bug a cause de la bdd
                        String nom_auteur = creationauteurTextField.getText();

                        if (livre.setAuteur(nom_auteur)) {// on assigne l'auteur au livre
                            livre.ajouter_livre_BDD();// on ajoute le livre dans la BDD
                            JOptionPane.showMessageDialog(null, "Livre ajouté dans la BDD");

                        } else {// si l'auteur na pas été affecté il faut le créer dans la BDD
                            nom_auteur = creer_auteur(nom_auteur);
                            JOptionPane.showMessageDialog(null, "Livre pas ajouté dans la BDD");
                            livre.ajouter_livre_BDD();// on ajoute le livre dans la BDD
                            JOptionPane.showMessageDialog(null, "Livre ajouté dans la BDD");

                        }

                    } catch (Exception e1) {
                        // TODO Auto-generated catch block
                        e1.printStackTrace();
                    }

                }
            }

        });
        panelcreationButton.add(creationButton, BorderLayout.CENTER);
        panelCreation.add(panelcreationButton);
        pagejouterlivre.add(panelCreation);

        JPanel liste_editeur = new JPanel();
        liste_editeur.setLayout(new BorderLayout());
        JLabel nomliste = new JLabel("Voici la liste de tous les editeur");
        liste_editeur.add(nomliste, BorderLayout.NORTH);
        // Création de la liste de editeur
        DefaultListModel<String> listModel = new DefaultListModel<>();
        for (Editeur editeur : bibliotheque.getediteurs()) {
            listModel.addElement(editeur.getId_editeur() + " " + editeur.getNom_editeur());
        }
        JList<String> livreList = new JList<>(listModel);
        JScrollPane scrollPane = new JScrollPane(livreList);
        liste_editeur.add(scrollPane, BorderLayout.CENTER);

    }

    public String creer_auteur(String nom_auteur) {
        JFrame pagejouterauteur = new JFrame();
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        pagejouterauteur.setLayout(new GridLayout(3, 0)); // Utilisation d'un BorderLayout pour mieux organiser les
                                                          // composants
        pagejouterauteur.getContentPane().setBackground(Color.LIGHT_GRAY);
        pagejouterauteur.setSize(400, 400);
        pagejouterauteur.setVisible(true);

        // Message de bienvenue en haut
        JLabel welcomeLabel = new JLabel("Bienvenue sur la page de création d'auteur", SwingConstants.CENTER);
        pagejouterauteur.add(welcomeLabel);

        // Panel de création d'un livre
        JPanel panelCreation = new JPanel();
        panelCreation.setBackground(Color.GRAY);
        panelCreation.setLayout(new GridLayout(5, 1)); // Utilisation d'un GridLayout pour organiser les composants

        JLabel creationnomauteurLabel = new JLabel("Nom de l'auteur :");
        panelCreation.add(creationnomauteurLabel);
        JTextField creationnomauteurTextField = new JTextField(20);
        panelCreation.add(creationnomauteurTextField);

        JLabel creationprenomauteurLabel = new JLabel("Prenom de l'auteur :");
        panelCreation.add(creationprenomauteurLabel);
        JTextField creationprenomauteurTextField = new JTextField(20);
        panelCreation.add(creationprenomauteurTextField);

        JLabel creationdatenaissanceLabel = new JLabel("Date de naissance:");
        panelCreation.add(creationdatenaissanceLabel);
        JTextField creationdatenaissanceTextField = new JTextField(20);
        panelCreation.add(creationdatenaissanceTextField);

        JLabel creationdatemortLabel = new JLabel("Date de mort:");
        panelCreation.add(creationdatemortLabel);
        JTextField creationdatemortTextField = new JTextField(20);
        panelCreation.add(creationdatemortTextField);

        JPanel panelcreationButton = new JPanel(new BorderLayout());
        JButton creationButton = new JButton("Création de l'auteur");

        creationButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try (Connection con = DriverManager.getConnection(Config.url, Config.user, Config.password)) {
                    Class.forName("com.mysql.cj.log.Slf4JLogger");
                    String nom_auteur = creationnomauteurTextField.getText();
                    String prenom_auteur = creationprenomauteurTextField.getText();
                    String datenaissance = creationdatenaissanceTextField.getText();
                    String datemort = creationdatemortTextField.getText();

                    Statement stmt = con.createStatement();
                    ResultSet res = stmt.executeQuery(
                            "Insert into auteur (nom_auteur,prenom_auteur,date_de_naissance,date_de_mort) auteur VALUES("
                                    + nom_auteur + "," + prenom_auteur + "," + datenaissance + "," + datemort + ");");
                    pagejouterauteur.setVisible(true);
                } catch (Exception e2) {
                    // TODO Auto-generated catch block
                    e2.printStackTrace();

                }
            }
        });
        panelcreationButton.add(creationButton, BorderLayout.CENTER);
        panelCreation.add(panelcreationButton);
        pagejouterauteur.add(panelCreation);

        return nom_auteur;

    }

    public static void main(String[] args) throws Exception {
        Bibliotheque bibliotheque = new Bibliotheque();
        SwingUtilities.invokeLater(() -> new Interface_Appli(bibliotheque));

    }
}
