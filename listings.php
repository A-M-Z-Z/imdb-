<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des films</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        <h1>Liste des films</h1>
        <div class="films">
            <?php
            // Lecture du fichier CSV
            $films = array_map('str_getcsv', file('films.csv'));

            // Pagination
            $filmsPerPage = 10;
            $totalFilms = count($films);
            $totalPages = ceil($totalFilms / $filmsPerPage);
            $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $start = ($currentPage - 1) * $filmsPerPage;
            $end = min($start + $filmsPerPage, $totalFilms); // Utilisez min() pour éviter de dépasser la taille du tableau
            
            // Affichage des films pour la page actuelle
            for ($i = $start; $i < $end; $i++) {
                if (isset($films[$i])) { // Vérifiez si $films[$i] est défini
                    $film = $films[$i];
                    echo '<div class="card">';
                    echo '<img src="' . $film[0] . '" alt="' . $film[1] . '">';
                    echo '<h2>' . $film[1] . '</h2>';
                    echo '<p>Note IMDB : ' . $film[8] . '</p>';
                    echo '<p>Genre : ' . $film[5] . '</p>';
                    echo '</div>';
                }
            }
            ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            // Affichage des liens de pagination
            echo '<a href="?page=' . max($currentPage - 1, 1) . '">Précédent</a>';
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<a href="?page=' . $i . '">' . $i . '</a>';
            }
            echo '<a href="?page=' . min($currentPage + 1, $totalPages) . '">Suivant</a>';
            ?>
        </div>
    </div>
</body>
</html>
