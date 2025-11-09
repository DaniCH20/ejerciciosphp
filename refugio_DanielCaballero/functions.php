<?php
include("connection.php");

function login($user, $pass)
{
    global $miPDO;
    $sql = "SELECT * FROM users WHERE username = :user"; //primero busca el usuario por el nombre
    $stmt = $miPDO->prepare($sql);
    $stmt->execute([':user' => $user]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($pass, $row['password'])) { //verifica el password con una funcion de php 
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        return true;
    }
    return false;
}
function getPopularBreeds()
{
    global $miPDO;

    $sql = "SELECT b.name AS raza, COUNT(p.id) AS cantidad
        FROM breeds b
        JOIN pets p ON b.id = p.breed_id
        GROUP BY b.name
        ORDER BY cantidad DESC
        LIMIT 3;
    ";

    $stmt = $miPDO->prepare($sql);
    $stmt->execute();

    $popularBreeds = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $popularBreeds[$row['raza']] = $row['cantidad'];
    }

    return $popularBreeds;
}

function getAllBreeds()
{
    global $miPDO;
    $sql = "SELECT b.name , count(b.name) as cantidad
    FROM breeds  b 
    JOIN pets p ON b.id=p.breed_id
    GROUP BY b.name 
;";
    $stmt = $miPDO->prepare($sql);
    $stmt->execute();
    $allbreeds = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $allbreeds[$row['name']] = $row['cantidad'];
    }

    return $allbreeds;
}
function getAdoptionPercentage()
{
    global $miPDO;

    // 1️⃣ Contar el total de mascotas
    $sqlTotal = "SELECT COUNT(*) AS total FROM pets";
    $stmtTotal = $miPDO->prepare($sqlTotal);
    $stmtTotal->execute();
    $total = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total'];

    if ($total == 0) {
        return ['adoptados' => 0, 'disponibles' => 0];
    }

    // 2️⃣ Contar adoptados
    $sqlAdopted = "SELECT COUNT(*) AS adoptados FROM pets WHERE adopted = 1";
    $stmtAdopted = $miPDO->prepare($sqlAdopted);
    $stmtAdopted->execute();
    $adoptados = $stmtAdopted->fetch(PDO::FETCH_ASSOC)['adoptados'];

    // 3️⃣ Calcular porcentajes
    $porcentajeAdoptados = round(($adoptados / $total) * 100, 2);
    $porcentajeDisponibles = round(100 - $porcentajeAdoptados, 2);

    return [
        'adoptados' => $porcentajeAdoptados,
        'disponibles' => $porcentajeDisponibles
    ];
}

function getMascotas()
{

    global $miPDO;
    $sql = " SELECT p.id , p.name , p.entry_date ,  p.image
    FROM pets  p
    WHERE p.adopted=0
    ORDER BY p.entry_date ASC 
    ;
    ";
    $stmt = $miPDO->prepare($sql);
    $stmt->execute();
    $html = '<div class="mascotas">';
    $counter = 0;
    while ($pet = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($counter % 3 == 0) {
            echo "<hr>";
        }
        $image_path = 'img/' . $pet['image'];
        $default_image = 'img/pet1.jpg';

        if (!empty($pet['image']) && file_exists($image_path)) {
            $img_src = $image_path;
        } else {
            $img_src = $default_image;
        }
        echo ('<form  id="formulario" action="shoepet.php" method="POST">
                    <br>
                    <img src=' . $img_src . ' alt="Imagen" width="300px">
                    <br>
                    <input type="hidden" name="id" value="' . $pet['id'] . '">
                    <label for="username">' . $pet['name'] . ':</label>
                    <br>
                    <button type="submit">Mas Informacion</button>
                </form>
                ');
        if ($counter % 3 == 1) {
            echo "</hr>";
        }

        $counter++;
    }
    if ($counter % 3 == 1) {
        echo "</div>";
    }

    return $html;
}
function getPetsAdopt()
{
    global $miPDO;
    $sql = " SELECT p.id , p.name , p.entry_date ,  p.image
    FROM pets  p
    WHERE p.adopted=1
    ORDER BY p.entry_date ASC 
    ;
    ";
    $stmt = $miPDO->prepare($sql);
    $stmt->execute();
    $html = '<div class="mascotas">';
    $counter = 0;
    while ($pet = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($counter % 3 == 0) {
            echo "<hr>";
        }
        $image_path = 'img/' . $pet['image'];
        $default_image = 'img/pet1.jpg';

        if (!empty($pet['image']) && file_exists($image_path)) {
            $img_src = $image_path;
        } else {
            $img_src = $default_image;
        }
        echo ('<form  id="formulario" action="shoepet.php" method="POST">
                    <br>
                    <img src=' . $img_src . ' alt="Imagen" width="300px">
                    <br>
                    <input type="hidden" name="id" value="' . $pet['id'] . '">
                    <label for="username">' . $pet['name'] . ':</label>
                    <br>
                    <button type="submit">Mas Informacion</button>
                </form>
                ');
        if ($counter % 3 == 1) {
            echo "</hr>";
        }

        $counter++;
    }
    if ($counter % 3 == 1) {
        echo "</div>";
    }

    return $html;
}
function getPetById($id, $eliminar , $modificar)
{

    global $miPDO;
    $sql = "SELECT p.id , p.name ,b.name as raza, p.age ,p.description , p.image ,p.entry_date ,IF(p.adopted >0 ,'Adoptado','Disponible' ) as situacion
        FROM pets  p
        JOIN breeds b ON p.breed_id=b.id
        WHERE p.id=:id
    ";
    $stmt = $miPDO->prepare($sql);
    $stmt->execute([':id' => $id]);

    if ($stmt->rowCount() <= 0) {
        echo '<p class="info">No hay informacion disponible.</p>';
        return;
    }
    $pet = $stmt->fetch(PDO::FETCH_ASSOC);
    $html = '<div class="mascotas">';
    $image_path = 'img/' . $pet['image'];
    $default_image = 'img/pet1.jpg';

    if (!empty($pet['image']) && file_exists($image_path)) {
        $img_src = $image_path;
    } else {
        $img_src = $default_image;
    }
    echo ('<br>
                      <img src=' . $img_src . ' alt="Imagen" width="300px">
                    <br>
                    <label>Nombre:</label> <label for="name">' . $pet['name'] . '</label>
                     <br>
                    <label>Raza:</label> <label for="raza">' . $pet['raza'] . '</label>
                     <br>
                    <label>Edad:</label> <label for="age">' . $pet['age'] . '</label>
                     <br>
                    <label>Situacion:</label> <label for="situacion">' . $pet['situacion'] . '</label>
                     <br>
                    <label>Fecha de entrada:</label> <label for="name">' . $pet['entry_date'] . '</label>
                     <br>
                    <label>Descripcion:</label> <label for="name">' . $pet['description'] . '</label>
                     <br>');
    if(isset($_SESSION['user_id'])){
           
        
    if($pet['situacion'] =="Disponible"){
        echo ('<form  id="formulario" action="shoepet.php" method="post">
                    <input type="hidden" name="id" value="'. $pet['id'] .'">
                    <input type="hidden" name="modificar" value="1">
                    <button type="submit">Modificar(Adoptado)</button>
                </form>
                <a href="./pets.php">Volver</a>
                ');
    }else{
        
        echo ('<form  id="formulario" action="shoepet.php" method="post">
                    <input type="hidden" name="id" value="'. $pet['id'] .'">
                    <input type="hidden" name="modificar" value="0">
                    <button type="submit"> Modificar(NO Adoptado)</button>
                </form>
                ');
        if(!$eliminar){
            echo('<form  id="formulario" action="shoepet.php" method="post">
            <input type="hidden" name="id" value="'. $pet['id'] .'">
            <input type="hidden" name="eliminar" value="true">
            <button type="submit">Eliminar</button>
            </form>
            <a href="./pets.php">Volver</a>
        ');
        }else{
        echo('<form  id="formulario" action="shoepet.php" method="post">
            <input type="hidden" name="id" value="'. $pet['id'] .'">
            <input type="hidden" name="eliminar" value="eliminardeVeras">
            <button type="submit">Ok eliminar</button>
            </form>
            <a href="./pets.php">Volver</a>
        ');
        }
        
        
    }                 
    }else{
           echo('<a href="./pets.php">Volver</a>');  
        }

    echo '</div>';

    return $html;
}
function eliminarMascota($id){
    global $miPDO;
    $sql = " DELETE FROM pets WHERE id=:id;
    ";
    $stmt = $miPDO->prepare($sql);
    $stmt->execute([':id' => $id]);
  header("Location: pets.php");

} 
function modificarMascota($id , $situacion){

    global $miPDO;
    $sql = " UPDATE pets SET adopted=:situacion WHERE id=:id";
    $stmt = $miPDO->prepare($sql);
    $stmt->bindParam(':situacion', $situacion);
     $stmt->bindParam(':id', $id);
    $stmt->execute();
    
}
