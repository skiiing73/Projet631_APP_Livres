<!DOCTYPE html>
<html lang="fr">

<?php
$_SESSION['page'] = "author";

// Include the necessary functions
require_once("./src/requests/table_books_details.php");

// Fetching the current book details, authors, average rating, and publisher
$livre_actuel = selectLivreByIdLivre($conn, $_GET["id_livre"]);
$auteurs = selectAuthorByBookID($conn, $livre_actuel["id_livre"]);
$moyenne_note = selectAvisByIdLivre($conn, $livre_actuel["id_livre"]);
$nom_editeur = selectEditeurByIdEditeur($conn, $livre_actuel["id_editeur"]);

// Get the total number of reviews
$total_records = selectCountAvis($conn, $livre_actuel["id_livre"]);

// Set the number of records per page
$limit = 10;

// Calculate the total number of pages
$total_pages = ceil($total_records / $limit);

// Get the current page number from the URL, default to 1
$page = isset($_GET['listnotices']) ? intval($_GET['listnotices']) : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $limit;
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/books_details.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>SuperLivres - <?php echo htmlspecialchars($livre_actuel["nom_livre"]); ?></title>
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
            echo "<p><span class='label'>Auteur(s) :</span> " . implode(", ", $auteurs) . "</p>";
            echo "<p><span class='label'>Genre :</span> " . htmlspecialchars($livre_actuel['genre']) . "</p>";
            echo "<p><span class='label'>Date de publication :</span> " . htmlspecialchars($livre_actuel["date_de_publication"]) . "</p>";
            echo "<p><span class='label'>Editeur :</span> " . htmlspecialchars($nom_editeur) . "</p>";

            // Display the average rating
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
            <form action="/submit_review" method="post">
                <div class="form-group">
                    <label for="rating">Note:</label><br>
                    <input type="radio" id="rating5" name="rating" value="5" required>
                    <label for="rating5">5</label>
                    <input type="radio" id="rating4" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input type="radio" id="rating3" name="rating" value="3">
                    <label for="rating3">3</label>
                    <input type="radio" id="rating2" name="rating" value="2">
                    <label for="rating2">2</label>
                    <input type="radio" id="rating1" name="rating" value="1">
                    <label for="rating1">1</label>
                </div>
                <div class="form-group">
                    <label for="review">Commentaire :</label><br>
                    <textarea id="review" name="review" rows="4" required></textarea>
                </div>
                <button type="submit">Submit Review</button>
            </form>
        </div>


        <div class="list_comments">
            <h1>Avis :</h1>
            <?php
            // Fetch and display the reviews
            $result = selectAllAvisByIdLivre($conn, $livre_actuel["id_livre"], $offset, $limit);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='info'>";
                $user = selectUtilisateurByIdUtilisateur($conn, $row["id_utilisateur"]);
                echo "<h2>" . htmlspecialchars($user) . " :</h2>";
                echo "<p>Date de publication : " . DateTime::createFromFormat('Y-m-d', $row["date_avis"])->format('d/m/Y') . "</p>";

                // Display the rating for each review
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
            // Pagination buttons
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
