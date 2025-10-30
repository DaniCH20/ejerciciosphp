<?php
require_once 'db.php';
require_once 'functions.php';
include 'header.php';

// Film guztiak lortu
$stmt = $pdo->query("SELECT * FROM movies");
$movies = $stmt->fetchAll();

// Batez besteko urtea kalkulatu
$average_year = calculateAverageYear($movies);

// Kategoriako zenbaketa lortu
$category_counts = countMoviesByCategory($pdo);

// Cookiearen informazioa lortu
$last_visit_message = "Lehen aldiz bisitatzen duzu orria!";
if (isset($_COOKIE['last_visit'])) {
    $last_visit_message = "Azken bisita: " . $_COOKIE['last_visit'];
}
?>

<h1>📊 Estatistikak</h1>

<div class="stats-container">
    <!-- <div class="stat-card">
        <h2>Filmen kopurua</h2>
        <div class="stat-value"><?php echo count($movies); ?></div>
        <p>Guztira datu basean</p>
    </div>
     -->
    <div class="stat-card">
        <h2>Batez besteko urtea</h2>
        <div class="stat-value"><?php echo $average_year; ?></div>
        <p>&nbsp;</p>
    </div>
    
    <!-- <div class="stat-card">
        <h2>Kategoria kopurua</h2>
        <div class="stat-value"><?php echo count($category_counts); ?></div>
        <p>Kategoria desberdinak</p>
    </div> -->
</div>

<div class="category-list">
    <h2>Kategoriako filmak</h2>
    <?php foreach ($category_counts as $category => $count): ?>
        <div class="category-item">
            <span class="category-name"><?php echo htmlspecialchars($category); ?></span>
            <span class="category-count"><?php echo $count; ?> film</span>
        </div>
    <?php endforeach; ?>
    <p>&nbsp;</p>
</div>

<div class="cookie-info">
    <p>🕒 <?php echo htmlspecialchars($last_visit_message); ?></p>
</div>

<?php include 'footer.php'; ?>