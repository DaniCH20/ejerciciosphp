<?php

function calculateAverageYear($movies) {
    if (empty($movies)) {
        return 0;
    }
    
    $total = 0;
    $count = count($movies);
    
    foreach ($movies as $movie) {
        $total += $movie['year'];
    }
    
    return round($total / $count, 2);
}
/*
function countMoviesByCategory($pdo) {
    // Kategoria guztiak lortu
    $stmt = $pdo->query("SELECT id, name FROM categories ORDER BY name ASC");
    $categories = $stmt->fetchAll();
    
    // Kategoria mapa sortu (id => name)
    $category_map = [];
    $counts = [];
    foreach ($categories as $category) {
        $category_map[$category['id']] = $category['name'];
        $counts[$category['name']] = 0;
    }
    
    // Film guztiak lortu BEHIN
    $stmt = $pdo->query("SELECT category_id FROM movies");
    $movies = $stmt->fetchAll();
    
    // Zenbatu
    foreach ($movies as $category_id) {
        if (isset($category_map[$category_id])) {
            $counts[$category_map[$category_id]]++;
        }
    }
    
    // Ordenatu
    arsort($counts);
    
    return $counts;
}

*/

 function countMoviesByCategory($pdo) {
     $sql = "SELECT c.name as category, COUNT(m.id) as count 
             FROM categories c 
             LEFT JOIN movies m ON c.id = m.category_id 
             GROUP BY c.id, c.name 
             ORDER BY count DESC, c.name ASC";
    
     $stmt = $pdo->query($sql);
     $results = $stmt->fetchAll();
    
     $counts = [];
     foreach ($results as $row) {
         $counts[$row['category']] = $row['count'];
     }
    
     return $counts; 
 }






// function countMoviesByCategory($pdo) {
//     // Kategoria guztiak lortu
//     $stmt = $pdo->query("SELECT id, name FROM categories ORDER BY name ASC");
//     $categories = $stmt->fetchAll();
    
   
//     // Array-a hasieratu 0 balioarekin
//     $counts = [];
//     foreach ($categories as $category) {
//         $counts[$category['name']] = 0;
//     }
    
//     // Filmak zenbatu kategoria bakoitzean
//     foreach ($categories as $category) {
//        // Film guztiak lortu
//        $stmt = $pdo->query("SELECT count(*) AS count FROM movies WHERE category_id = " . $category['id']);
//        $resultados = $stmt->fetch();

//         $counts[$category['name']] += $resultados['count'];
//     }

    
//     // Ordenatu kopuruaren arabera (handienetik txikienera)
//     arsort($counts); // mantiene las claves (nombres) y ordena por valor
    
//     return $counts;
// }

?>