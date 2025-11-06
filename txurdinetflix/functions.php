<?php
include "db.php";

function getAllPelis() {
    global $miPDO;

    $sql = "SELECT * FROM movies";
    $stmt = $miPDO->query($sql);

   imprimirTabla($stmt);
}
function getNombreMovie($title){
    global $miPDO;

    $sql = "SELECT * FROM movies WHERE title= :til";
     $stmt = $miPDO->prepare($sql);
    $stmt->bindParam(':til', $title);
  
     imprimirTabla($stmt);
}
function imprimirTabla($stmt){
     echo "
    <table class='oferts-table'>
        <thead>
            <tr>
                <th class='titulo'>ID</th>
                <th class='titulo'>Título</th>
                <th class='titulo'>Director</th>
                <th class='titulo'>Año</th>
                <th class='titulo'>Categoría</th>
                <th class='titulo'>Imagen</th>
            </tr>
        </thead>
        <tbody>
    ";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         $image_path = 'img/' . $row['image'];
                        $default_image = 'img/default.jpg';
                        
                        if (!empty($row['image']) && file_exists($image_path)) {
                            $img_src = $image_path;
                        } else {
                            $img_src = $default_image;
                        }
        echo "
        <tr class='movie'>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['title']) . "</td>
            <td>" . htmlspecialchars($row['director']) . "</td>
            <td>" . htmlspecialchars($row['year']) . "</td>
            <td>" . htmlspecialchars($row['category_id']) . "</td>
            <td><img src='$img_src' 
            alt='Imagen de la película' class='movie-img' 
            ></td>
        </tr>
        ";
        
    }

    echo "</tbody></table>";
}

?>
