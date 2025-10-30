<?php
require_once 'db.php';
include 'header.php';

// Bilaketa parametroak jaso
$search_title = isset($_GET['title']) ? trim($_GET['title']) : '';
$search_director = isset($_GET['director']) ? trim($_GET['director']) : '';

// SQL kontsulta prestatu
$sql = "SELECT m.*, c.name as category_name 
        FROM movies m 
        INNER JOIN categories c ON m.category_id = c.id 
        WHERE 1=1";

$params = [];

if (!empty($search_title)) {
    $sql .= " AND m.title LIKE :title";
    $params[':title'] = '%' . $search_title . '%';
}

if (!empty($search_director)) {
    $sql .= " AND m.director LIKE :director";
    $params[':director'] = '%' . $search_director . '%';
}

$sql .= " ORDER BY c.name ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$movies = $stmt->fetchAll();
?>


<h1>Filmak zerrenda</h1>

<div class="search-form">
    <form method="GET" action="movies.php">
        <div class="form-row">
            <div class="form-group">
                <label for="title">Izenburua:</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($search_title); ?>">
            </div>
            <div class="form-group">
                <label for="director">Zuzendaria:</label>
                <input type="text" id="director" name="director" value="<?php echo htmlspecialchars($search_director); ?>">
            </div>
            <div>
                <button type="submit" class="btn">🔍 Bilatu</button>
                <!-- <a href="movies.php" class="btn btn-secondary">🔄 Garbitu</a> -->
            </div>
        </div>
    </form>
</div>

<?php if (count($movies) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Izenburua</th>
                <th>Zuzendaria</th>
                <th>Urtea</th>
                <th>Kategoria</th>
                <th>Irudia</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><?php echo htmlspecialchars($movie['id']); ?></td>
                    <td><?php echo htmlspecialchars($movie['title']); ?></td>
                    <td><?php echo htmlspecialchars($movie['director']); ?></td>
                    <td><?php echo htmlspecialchars($movie['year']); ?></td>
                    <td><?php echo htmlspecialchars($movie['category_name']); ?></td>

                    <?php 
                        $image_path = 'img/' . $movie['image'];
                        $default_image = 'img/default.jpg';
                        
                        if (!empty($movie['image']) && file_exists($image_path)) {
                            $img_src = $image_path;
                        } else {
                            $img_src = $default_image;
                        }
                    ?>

                    <td><img src="<?php echo $img_src; ?>" alt="<?php echo $img_src; ?>" width="50" height="75"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="no-results">
        <p>Ez da filmarik aurkitu bilaketa honekin.</p>
    </div>
<?php endif; ?>

<?php include 'footer.php'; ?>