<!DOCTYPE html>
<html lang="fr">

<?php
// Session 
$_SESSION['page'] = "books";
// Les fonctions importés : 
require_once("./src/requests/table_books.php");
// ICONS
// https://fontawesome.com/icons
// Total number of records
$total_records = selectCountLivre($conn);

// Number of records per page
$limit = 10;

// Calculating the number of pages
$total_pages = ceil($total_records / $limit);

// Current page number from URL, default is 1
$page = isset($_GET['listbooks']) ? intval($_GET['listbooks']) : 1;

// Offset calculation
$offset = ($page - 1) * $limit;

// Sorting options
$options = isset($_GET['options']) ? intval($_GET['options']) : 0;
?>

<head>
    <meta charset="UTF-8">
    <?php  //css a ajouter apres 
    ?>
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/books.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>SuperLivres - Nos livres </title>
</head>

<body>
    <?php
    require_once("./src/components/navbar/navbar.php");
    ?>
    <div class="container">
        <div class="container-titre">
            <span class="stars">★</span>
            <h1 class="titre"> Nos livres </h1>
            <span class="stars">★</span>
        </div>

        <div class="advanced_search">
            <h2>Recherche avancée : </h2>
            <div class="pack_advanced_search">
                <form action="livres.php" method="get">
                    <p>Modifier l'ordre :</p>
                    <select name="options">
                        <?php
                        $var = ['A-Z', 'Z-A', 'Genre croissant', 'Genre décroissant', 'Date croissante', 'Date décroissante'];

                        // Parcours du tableau et création des options
                        foreach ($var as $i => $valeur) {
                            echo "<option value=\"$i\">$valeur</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Valider">
                    <input type="hidden" name="pages" value="books">
                </form>
            </div>
        </div>
        <div class="list_books">
            <?php
            if (selectAllLivre($conn, $offset, $limit)) {

                if (!isset($_GET["options"])) {
                    $result = selectAllLivre($conn, $offset, $limit);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class='info'>";
                        echo "<h2> " . $row["nom_livre"] . " : </h2>";
                        echo "<p> Auteurs : ";
                        $auteurs = selectAuteursByIdLivre($conn, $row["id_livre"]);
                        foreach ($auteurs as $auteur) {
                            echo $auteur . ", ";
                        }
                        echo "</p>";
                        echo "<p> Genre : " . $row['genre'] . "      |   Date de publication : " . DateTime::createFromFormat('Y-m-d', $row["date_de_publication"])->format('d/m/Y') . " </p>";
                        echo "<p> Note : ";

                        if (selectAvisByIdLivre($conn, $row["id_livre"])) {
                            $moyenneNote = floatval(selectAvisByIdLivre($conn, $row["id_livre"]));
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
                        echo "<a href='./livres.php?pages=books_details&id_livre=" . $row["id_livre"] . "' class='books_button'>Voir</a>";
                        echo "</div>";
                    }
                } else {
                    $result = selectAllLivreOrder($conn, $_GET["options"], $offset, $limit);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class='info'>";
                        echo "<h2> " . $row["nom_livre"] . " : </h2>";
                        echo "<p> Auteurs : ";
                        $auteurs = selectAuteursByIdLivre($conn, $row["id_livre"]);
                        foreach ($auteurs as $auteur) {
                            echo $auteur . ", ";
                        }
                        echo "</p>";
                        echo "<p> Genre : " . $row['genre'] . "      |   Date de publication : " . DateTime::createFromFormat('Y-m-d', $row["date_de_publication"])->format('d/m/Y') . " </p>";
                        echo "<p> Note : ";

                        if (selectAvisByIdLivre($conn, $row["id_livre"])) {
                            $moyenneNote = floatval(selectAvisByIdLivre($conn, $row["id_livre"]));
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
                        echo "<a href='./livres.php?pages=books_details&id_livre=" . $row["id_livre"] . "' class='books_button'>Voir</a>";
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>
        <div class="pagination">
            <?php
            // Previous button
            if ($page > 1) {
                echo "<a href='livres.php?pages=books&options=$options &listbooks=" . ($page - 1) . " ' class='pagination_button'>Précédent</a>";
            } else {
                echo "<span class='pagination_button disabled'>Précédent</span>";
            }

            // First page button
            if ($page > 1) {
                echo "<a href='livres.php?pages=books&options=$options&listbooks=1' class='pagination_button'>1</a>";
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
                echo "<a href='livres.php?pages=books&options=$options&listbooks=$total_pages' class='pagination_button'>$total_pages</a>";
            }

            // Next button
            if ($page < $total_pages) {
                echo "<a href='livres.php?pages=books&options=$options&listbooks=" . ($page + 1) . "' class='pagination_button'>Suivant</a>";
            } else {
                echo "<span class='pagination_button disabled'>Suivant</span>";
            }
            ?>

        </div>
    </div>
    <?php


    require_once("./src/components/footer/footer.php");
    ?>

</body>

<script src="https://kit.fontawesome.com/008612b1fd.js" crossorigin="anonymous"></script>