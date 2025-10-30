<?php
// Cookiea kudeatu
if (!isset($_COOKIE['last_visit'])) {
    $current_date = date('Y-m-d H:i:s');
    setcookie('last_visit', $current_date, time() + (86400 * 30), "/");
}

include 'header.php';
?>


<div class="welcome">
    <h1>Ongi etorri Txurdi-Netflix-era!</h1>
    <p>Zure film gustukoenak kudeatzeko plataforma</p>
    
    <div class="features">
        <div class="feature-card">
            <h3>📽️ <a href="movies.php">Ikusi</a></h3>
            <p>Ikusi gure film bildumako pelikula guztiak</p>
        </div>
        <div class="feature-card">
            <h3>🔍  <a href="movies.php">Bilatu</a></h3>
            <p>Aurkitu filmak izenburuaren edo zuzendariaren arabera</p>
        </div>
        <div class="feature-card">
            <h3>➕ <a href="add_movie.php">Gehitu</a></h3>
            <p>Gehitu zure film gustukoena bildumara</p>
        </div>
        <div class="feature-card">
            <h3>📊 <a href="statistics.php">Estatistikak</a></h3>
            <p>Ikusi film bildumaren estatistika interesgarriak</p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>