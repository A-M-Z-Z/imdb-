<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrer par Genre</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* styles.css */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #000;
    color: #fff;
}

.container {
    width: 90%;
    margin: 0 auto;
    padding: 20px 0;
}

h1, h2 {
    color: #ffcc00;
}

.navbar {
    background-color: #0066cc; /* Fond bleu */
    padding: 10px 0;
}

.navbar ul {
    list-style: none;
    margin: 0;
    padding: 0;
    text-align: center;
}

.navbar ul li {
    display: inline;
    margin-right: 10px; /* Espacement entre les éléments */
}

.navbar ul li:last-child {
    margin-right: 0; /* Aucun espacement pour le dernier élément */
}

.navbar ul li a {
    color: #ffcc00;
    text-decoration: none;
    padding: 10px;
}

.navbar ul li a:hover {
    background-color: #ffcc00; /* Fond jaune au survol */
    color: #000;
}
</style>
<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        <h1>Filtrer par Genre</h1>
        <!-- Formulaire de sélection de genre et affichage des films filtrés -->
        <form method="GET">
            <label for="genre">Choisir un genre :</label>
            <select name="genre" id="genre">
                <option value="Animation">Animation</option>
                <option value="Documentaire">Documentaire</option>
                <!-- Autres options de genre -->
            </select>
            <button type="submit">Filtrer</button>
        </form>
        
        <div class="films">
            <?php
            // Lecture du fichier CSV
            $films = array_map('str_getcsv', file('films.csv'));
            
            // Filtrer les films par genre si un genre est sélectionné
            if(isset($_GET['genre'])) {
                $genre = $_GET['genre'];
                $filteredFilms = array_filter($films, function($film) use ($genre) {
                    return $film[3] == $genre;
                });
            } else {
                $filteredFilms = $films;
            }

            // Affichage des films filtrés
            foreach ($filteredFilms as $film) {
                echo '<div class="card">';
                echo '<img src="' . $film[0] . '" alt="' . $film[1] . '">';
                echo '<h2>' . $film[1] . '</h2>';
                echo '<p>Note IMDB : ' . $film[8] . '</p>';
                echo '<p>Genre : ' . $film[5] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
