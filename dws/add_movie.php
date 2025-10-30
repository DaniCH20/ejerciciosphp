<?php
require_once 'db.php';
include 'header.php';

$errors = [];
$success = false;

// Kategoriak lortu
$stmt = $pdo->query("SELECT * FROM categories ORDER BY name ASC");
$categories = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $director = isset($_POST['director']) ? trim($_POST['director']) : '';
    $year = isset($_POST['year']) ? trim($_POST['year']) : '';
    $category_id = isset($_POST['category_id']) ? trim($_POST['category_id']) : '';
    
    // BALIDAZIOAK
    
    // Eremu guztiak beharrezkoak
    if (empty($title)) {
        $errors[] = "Izenburua beharrezkoa da.";
    }
    if (empty($director)) {
        $errors[] = "Zuzendaria beharrezkoa da.";
    }
    if (empty($year)) {
        $errors[] = "Urtea beharrezkoa da.";
    }
    if (empty($category_id)) {
        $errors[] = "Kategoria hautatu behar da.";
    }
    
    // Izenburua letra larriz hasi behar du
    if (!empty($title) && !preg_match('/^[A-Z]/', $title)) {
        $errors[] = "Izenburua letra larriz hasi behar du.";
    }
    
    // Zuzendaria letra larriz hasi behar du
    if (!empty($director) && !preg_match('/^[A-Z]/', $director)) {
        $errors[] = "Zuzendaria letra larriz hasi behar du.";
    }
    
    // Urtea zenbakizkoa eta 4 digitukoa
    if (!empty($year) && (!is_numeric($year) || strlen($year) != 4)) {
        $errors[] = "Urtea zenbakizkoa izan behar da eta 4 digitukoa.";
    }
    
    // Irudiaren balidazioa
    $image_name = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        
        if (!in_array($file_extension, $allowed_extensions)) {
            $errors[] = "Irudiaren formatua okerra da. Onartutakoak: jpg, jpeg, png, gif.";
        } else {
            $image_name = time() . '_' . $_FILES['image']['name'];
            $upload_path = 'img/' . $image_name;
            
            if (!is_dir('img')) {
                mkdir('img', 0777, true);
            }
            
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                $errors[] = "Errorea irudia igotzerakoan.";
                $image_name = null;
            }
        }
    } else {
        $errors[] = "Irudia beharrezkoa da.";
    }
    
    // Errorerik ez badago, sartu datu basean
    if (empty($errors)) {
        $sql = "INSERT INTO movies (title, director, year, category_id, image) 
                VALUES (:title, :director, :year, :category_id, :image)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':title' => $title,
            ':director' => $director,
            ':year' => $year,
            ':category_id' => $category_id,
            ':image' => $image_name
        ]);
        
        $success = true;
    }
}
?>


<div class="form-container">
    <h1>Filma berria gehitu</h1>
    
    <?php if (!empty($errors)): ?>
        <div class="alert alert-error">
            <strong>Erroreak:</strong>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <?php if ($success): ?>
        <div class="alert alert-success">
            <strong>Ondo!</strong> Filma behar bezala gehitu da.
            <br><br>
            <a href="movies.php" style="color: #fff; text-decoration: underline;">Filmak ikusi</a>
        </div>
    <?php endif; ?>
    
    <form method="POST" action="add_movie.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Izenburua *</label>
            <input type="text" id="title" name="title" value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>">
        </div>
        
        <div class="form-group">
            <label for="director">Zuzendaria *</label>
            <input type="text" id="director" name="director" value="<?php echo isset($_POST['director']) ? htmlspecialchars($_POST['director']) : ''; ?>">
        </div>
        
        <div class="form-group">
            <label for="year">Urtea *</label>
            <input type="text" id="year" name="year" value="<?php echo isset($_POST['year']) ? htmlspecialchars($_POST['year']) : ''; ?>">
        </div>
        
        <div class="form-group">
            <label for="category_id">Kategoria *</label>
            <select id="category_id" name="category_id">
                <option value="">Hautatu kategoria bat...</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>" 
                        <?php echo (isset($_POST['category_id']) && $_POST['category_id'] == $category['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="image">Irudia *</label>
            <input type="file" id="image" name="image" accept="image/*">
        </div>
        
        <button type="submit" class="btn">Gehitu filma</button>
    </form>
</div>

<?php include 'footer.php'; ?>