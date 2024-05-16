
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
        setLayout(new GridLayout(4, 1));
        getContentPane().setBackground(Color.PINK);
        setSize(400, 400);
        setVisible(true);

        // Message de bienvenue en haut
        JLabel Label = new JLabel("Bienvenue sur la page du gestion des Livres", SwingConstants.CENTER);
        add(Label);
    }
}
