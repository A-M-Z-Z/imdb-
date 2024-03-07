<!-- menu.php -->

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

<nav class="navbar">
    <ul>
        <li><a href="index.php" <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>>Home</a></li>
        <li><a href="listings.php" <?php if(basename($_SERVER['PHP_SELF']) == 'listings.php') echo 'class="active"'; ?>>Listings</a></li>
        <li><a href="filter.php" <?php if(basename($_SERVER['PHP_SELF']) == 'filter.php') echo 'class="active"'; ?>>Filtrer par Genre</a></li>
        <li><a href="about.php" <?php if(basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?>>About Us</a></li>
    </ul>
</nav>
