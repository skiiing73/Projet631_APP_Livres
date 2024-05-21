<!DOCTYPE html>
<html lang="fr">

<?php
$_SESSION['page'] = "books_details";

require_once("./src/requests/table_books_details.php");

$livre_actuel = selectLivreByIdLivre($conn, $_GET["id_livre"]);
$auteurs = selectAuthorByBookID($conn, $livre_actuel["id_livre"]);
$moyenne_note = selectAvisByIdLivre($conn, $livre_actuel["id_livre"]);
$nom_editeur = selectEditeurByIdEditeur($conn, $livre_actuel["id_editeur"]);

$total_records = selectCountAvis($conn, $livre_actuel["id_livre"]);
$limit = 10;
$total_pages = ceil($total_records / $limit);
$page = isset($_GET['listnotices']) ? intval($_GET['listnotices']) : 1;
$offset = ($page - 1) * $limit;
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/books_details.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>SuperLivres - <?php echo htmlspecialchars($livre_actuel["nom_livre"]); ?></title>
    <link rel="icon" type="image/x-icon" href="../../pictures/favicon.ico">
</head>

<body>
    <?php require_once("./src/components/navbar/navbar.php"); ?>

    <div class="container">
        <div class="container-titre">
            <span class="stars">★</span>
            <h1 class="titre"><?php echo htmlspecialchars($livre_actuel["nom_livre"]); ?></h1>
            <span class="stars">★</span>
        </div>

        <div class="details_informations">
            <h2>Informations détaillées :</h2>
            <?php
            echo "<p><span class='label'>Auteur(s) :</span> ";
            foreach ($auteurs as $index => $auteur) {
                echo "<a href='author_page.php?id=" . htmlspecialchars($auteur['id_auteur']) . "'>" . htmlspecialchars($auteur['prenom_auteur']) . " " . htmlspecialchars($auteur['nom_auteur']) . "</a>";
                if ($index < count($auteurs) - 1) {
                    echo ", ";
                }
            }
            echo "</p>";
            echo "<p><span class='label'>Genre :</span> " . htmlspecialchars($livre_actuel['genre']) . "</p>";
            echo "<p><span class='label'>Date de publication :</span> " . htmlspecialchars($livre_actuel["date_de_publication"]) . "</p>";
            echo "<p><span class='label'>Editeur :</span> " . htmlspecialchars($nom_editeur) . "</p>";

            $averageRate = selectAverageRateReview($conn, $livre_actuel["id_livre"]);
            if ($averageRate) {
                $moyenneNote = floatval($averageRate);
                echo "<p><span class='label'>Note : </span>" . round($moyenneNote, 1) . " ";
                while ($moyenneNote >= 0.5) {
                    if ($moyenneNote >= 1) {
                        echo "<span class='stars'><i class='fa-solid fa-star'></i></span>";
                        $moyenneNote -= 1;
                    } elseif ($moyenneNote >= 0.5) {
                        echo "<span class='stars'><i class='fa-solid fa-star-half-stroke'></i></span>";
                        $moyenneNote -= 0.5;
                    }
                }
                echo "</p>";
            }
            ?>

            <a href='livres.php?pages=books' class='pagination_button'>Retour</a>
        </div>

        <div id="add_review">
            <h2>Ecrivez votre avis :</h2>
            <?php
            if (isset($_GET['user_id'])) {
                echo "<form action='/submit_review' method='post'>";
                echo "<div class='form-group'>";
                echo "<label for='rating'>Note:</label><br>";
                // Créer des labels pour les étoiles
                for ($i = 5; $i >= 1; $i--) {
                    echo "<input type='radio' id='rating$i' name='rating' value='$i' style='display: none;' required>";
                    echo "<label for='rating$i' class='star-label'><i class='fa-solid fa-star' data-rating='$i'></i></label>";
                }
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='review'>Commentaire :</label><br>";
                echo "<textarea id='review' name='review' rows='4' required></textarea>";
                echo "</div>";
                echo "<button type='submit'>Submit Review</button>";
                echo "</form>";
            } else {
                echo "Vous devez être connecté pour laisser un avis.";
            }
            ?>
        </div>


        <div class="list_comments">
            <h1>Avis :</h1>
            <?php
            $result = selectAllAvisByIdLivre($conn, $livre_actuel["id_livre"], $offset, $limit);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='info'>";
                $user = selectUtilisateurByIdUtilisateur($conn, $row["id_utilisateur"]);
                echo "<h2>" . htmlspecialchars($user) . " :</h2>";
                echo "<p>Date de publication : " . DateTime::createFromFormat('Y-m-d', $row["date_avis"])->format('d/m/Y') . "</p>";

                $note = floatval($row["note"]);
                echo "<p>Note : $note | ";
                while ($note >= 0.5) {
                    if ($note >= 1) {
                        echo "<span class='stars'><i class='fa-solid fa-star'></i></span>";
                        $note -= 1;
                    } elseif ($note >= 0.5) {
                        echo "<span class='stars'><i class='fa-solid fa-star-half-stroke'></i></span>";
                        $note -= 0.5;
                    }
                }
                echo "</p>";
                echo "<p>Commentaire : " . htmlspecialchars($row["commentaire"]) . "</p>";
                echo "</div>";
            }
            ?>
        </div>

        <div class="pagination">
            <?php
            if ($page > 1) {
                echo "<a href='livres.php?pages=books_details&listnotices=" . ($page - 1) . "' class='pagination_button'>Précédent</a>";
            } else {
                echo "<span class='pagination_button disabled'>Précédent</span>";
            }

            if ($page > 1) {
                echo "<a href='livres.php?pages=books_details&listnotices=1' class='pagination_button'>1</a>";
                if ($page > 2) {
                    echo "<span class='pagination_button disabled'>...</span>";
                }
            }

            echo "<span class='pagination_button current_page'>$page</span>";

            if ($page < $total_pages) {
                if ($page < $total_pages - 1) {
                    echo "<span class='pagination_button disabled'>...</span>";
                }
                echo "<a href='livres.php?pages=books_details&listnotices=$total_pages' class='pagination_button'>$total_pages</a>";
            }

            if ($page < $total_pages) {
                echo "<a href='livres.php?pages=books_details&listnotices=" . ($page + 1) . "' class='pagination_button'>Suivant</a>";
            } else {
                echo "<span class='pagination_button disabled'>Suivant</span>";
            }
            ?>
        </div>
    </div>

    <?php require_once("./src/components/footer/footer.php"); ?>
</body>

<script src="https://kit.fontawesome.com/008612b1fd.js" crossorigin="anonymous"></script>
</html>
