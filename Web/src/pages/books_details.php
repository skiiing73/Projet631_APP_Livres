<!DOCTYPE html>
<html lang="fr">
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_SESSION["id_user"])) {
    // Assuming $conn is a valid mysqli connection
    if (isset($_POST["note"]) && isset($_POST["comment"]) && isset($_GET["id_livre"])) {
        $note = trim($_POST["note"]);
        $comment = trim($_POST["comment"]);
        $id_livre = intval($_GET["id_livre"]);
        $id_utilisateur = intval($_SESSION["id_user"]);

        // Validate inputs
        if (!is_numeric($note) || $note < 0 || $note > 5) { // Example validation for a rating scale of 0-5
            $error_message = "La note doit être un nombre entre 0 et 5.";
        } elseif (empty($comment)) {
            $error_message = "Le commentaire ne peut pas être vide.";
        } else {
            $stmt = $conn->prepare("INSERT INTO Avis (note, commentaire, date_avis, id_livre, id_utilisateur) VALUES (?, ?, NOW(), ?, ?)");
            if ($stmt) {
                $stmt->bind_param("isii", $note, $comment, $id_livre, $id_utilisateur);
                if ($stmt->execute()) {
                    $success_message = "Votre avis a été soumis avec succès.";
                } else {
                    $error_message = "Erreur lors de l'insertion de l'avis: " . $stmt->error;
                }
                $stmt->close();
            } else {
                $error_message = "Erreur de préparation de la requête: " . $conn->error;
            }
        }
    } else {
        $error_message = "Le champs avis est requis.";
    }
} else {
    $error_message = "Vous devez être connecté pour laisser un avis.";
}
?>
<?php
// Les fonctions importés : 
require_once("./src/requests/table_books_details.php");

$livre_actuel = selectLivreByIdLivre($conn, $_GET["id_livre"]);
$auteurs = selectAuteursByIdLivre($conn, $livre_actuel["id_livre"]);
$moyenne_note = selectAvisByIdLivre($conn, $livre_actuel["id_livre"]);
$nom_editeur = selectEditeurByIdEditeur($conn, $livre_actuel["id_editeur"]);

// Total number of records
$total_records = selectCountAvis($conn, $livre_actuel["id_livre"]);

// Number of records per page
$limit = 10;

// Calculating the number of pages
$total_pages = ceil($total_records / $limit);

// Current page number from URL, default is 1
$page = isset($_GET['listnotices']) ? intval($_GET['listnotices']) : 1;

// Offset calculation
$offset = ($page - 1) * $limit;

?>

<head>
    <meta charset="UTF-8">
    <?php  //css a ajouter apres 
    ?>
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/books_details.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>SuperLivres - <?php echo $livre_actuel["nom_livre"]; ?> </title>
</head>

<body>
    <?php
    require_once("./src/components/navbar/navbar.php");
    ?>
    <div class="container">
        <div class="container-titre">
            <span class="stars">★</span>
            <h1 class="titre"> <?php echo $livre_actuel["nom_livre"]; ?> </h1>
            <span class="stars">★</span>
        </div>

        <div class="details_informations">
            <h2>Informations détaillées : </h2>
            <?php
            echo "<p> Auteurs : ";
            foreach ($auteurs as $auteur) {
                echo $auteur . ", ";
            }
            echo "</p>";
            echo "<p> Genre : " . $livre_actuel['genre'] . " </p> <p>Date de publication : " . $livre_actuel["date_de_publication"] . " </p> <p>Editeur : " . $nom_editeur . " </p>";
            echo "<p> Note : ";

            if (selectAverageRateReview($conn, $livre_actuel["id_livre"])) {
                $moyenneNote = floatval(selectAverageRateReview($conn, $livre_actuel["id_livre"]));
                echo $moyenneNote . " | ";
                while ($moyenneNote >= 0.5) {
                    if ($moyenneNote >= 1) {
                        echo " <span class= 'stars' ><i class='fa-solid fa-star'></i></span> ";
                        $moyenneNote = $moyenneNote - 1;
                    } else if ($moyenneNote >= 0.5) {
                        echo "<span class= 'stars'> <i class='fa-solid fa-star-half-stroke'></i></span> ";
                        $moyenneNote = $moyenneNote - 1;
                    } else {
                        $moyenneNote = $moyenneNote - 1;
                    }
                }
            } else {
            }
            echo "</p>";
            echo "<a href='livres.php?pages=books' class='pagination_button'>Retour</a>";
            echo "</div>";
            ?>

            <div class="details_informations">
                <h2>Donnez votre avis : </h2>
                <?php
                if (isset($error_message)) {
                    echo "<p id='message' style='color:red;'>$error_message</p>";
                }
                if (isset($success_message)) {
                    echo "<p id='message' style='color:green;'>$success_message</p>";
                }
                ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="note">Note </label>
                        <input type="number" id="note" name="note" min="0" max="5" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Commentaire</label>
                        <input type="text" id="comment" name="comment" required>
                    </div>
                    <button type="submit">Envoyer</button>
                </form>

            </div>
            <div class="list_comments">
                <?php
                $result = selectAllAvisByIdLivre($conn, $livre_actuel["id_livre"], $offset, $limit);
                echo "<h1> Avis : </h1>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='info'>";
                    echo "<h2> " . selectUtilisateurByIdUtilisateur($conn, $row["id_utilisateur"]) . " : </h2>";
                    echo "<p> Date de publication : " . DateTime::createFromFormat('Y-m-d', $row["date_avis"])->format('d/m/Y') . " </p>";
                    echo "<p> Note : ";

                    if ($row["note"] != null) {
                        $moyenneNote = floatval($row["note"]);
                        echo $moyenneNote . " | ";
                        while ($moyenneNote >= 0.5) {
                            if ($moyenneNote >= 1) {
                                echo " <span class= 'stars' ><i class='fa-solid fa-star'></i></span> ";
                                $moyenneNote = $moyenneNote - 1;
                            } else if ($moyenneNote >= 0.5) {
                                echo "<span class= 'stars'> <i class='fa-solid fa-star-half-stroke'></i></span> ";
                                $moyenneNote = $moyenneNote - 1;
                            } else {
                                $moyenneNote = $moyenneNote - 1;
                            }
                        }
                    } else {
                    }
                    echo "</p>";
                    echo "<p> Commentaire : " . $row["commentaire"] . " </p>";
                    echo "</div>";
                }
                ?>
            </div>
            <div class="pagination">
                <?php
                // Previous button
                if ($page > 1) {
                    echo "<a href='livres.php?pages=books_details&listnotices=" . ($page - 1) . " ' class='pagination_button'>Précédent</a>";
                } else {
                    echo "<span class='pagination_button disabled'>Précédent</span>";
                }

                // First page button
                if ($page > 1) {
                    echo "<a href='livres.php?pages=books_details&listnotices=1' class='pagination_button'>1</a>";
                    if ($page > 2) {
                        echo "<span class='pagination_button disabled'>...</span>";
                    }
                }

                // Current page button
                echo "<span class='pagination_button current_page'>$page</span>";

                // Last page button
                if ($page < $total_pages) {
                    if ($page < $total_pages - 1) {
                        echo "<span class='pagination_button disabled'>...</span>";
                    }
                    echo "<a href='livres.php?pages=books_details&listnotices=$total_pages' class='pagination_button'>$total_pages</a>";
                }

                // Next button
                if ($page < $total_pages) {
                    echo "<a href='livres.php?pages=books_details&listnotices=" . ($page + 1) . "' class='pagination_button'>Suivant</a>";
                } else {
                    echo "<span class='pagination_button disabled'>Suivant</span>";
                }
                ?>

            </div>
        </div>
    </div>
    <?php



    require_once("./src/components/footer/footer.php");
    ?>

</body>
<script src="https://kit.fontawesome.com/008612b1fd.js" crossorigin="anonymous"></script>