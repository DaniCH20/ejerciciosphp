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
    $sql = "SELECT b.name , count(b.name) as cantidad
    FROM breeds  b 
    JOIN pets p ON b.id=p.breed_id
    GROUP BY b.name 
    ORDER BY cantidad DESC
    LIMIT 3
    ;";
    $stmt = $miPDO->prepare($sql);
    $stmt->execute();

    return $row = $stmt->fetch(PDO::FETCH_ASSOC);
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
    $arrayAsociativo = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $arrayAsociativo[$row['name']] = $row['cantidad'];
    }

    return $arrayAsociativo;
}
function getAdoptionPercentage()
{

    global $miPDO;
    $sql = " SELECT count(p.adopted)as numero
    ,(p.adopted) as adopcion
    FROM pets  p
    GROUP BY p.adopted 
    ;
    ";
    $stmt = $miPDO->prepare($sql);
    $stmt->execute();
    $adopcion = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($row['adopcion'] == 0) {
            $adopcion['adoptado'] =  $row['numero'];
        } else {
            $adopcion['noadoptado'] =  $row['numero'];
        }
    }
    return $adopcion;
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
            echo "<tr>";
        }
        echo ('<form  id="formulario" action="shoepet.php" method="post">
                    
                    <input type="hidden" id="id" value="' . $pet['id'] .'">
                    <label for="username">' . $pet['name'] . ':</label>
                    <br>
                    <img src=./img/' . $pet['image'] . ' alt="Imagen" width="300px">
                    <br>
                    <button type="submit">Mas Informacion</button>
                </form>
                ');
        if ($counter % 3 == 1) {
            echo "</tr>";
        }

        $counter++;
    }
    if ($counter % 3 == 1) {
        echo "</tr>";
    }
    echo '</div>';

    return $html;
}
function getPetsAdopt()
{
    global $miPDO;
    $sql = " SELECT p.id p.name , p.entry_date 
    FROM pets  p
    WHERE p.adopted=1
    ORDER BY p.entry_date ASC 
    ;
    ";
    $stmt = $miPDO->prepare($sql);
    $stmt->execute();
    $html = '<div class="mascotas">';
    while ($pet = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo ('<form  id="formulario" action="shoepet.php" method="post">
                    <label for="username">' . $pet['name'] . ':</label>
                    <br>
                   <img src=./img/' . $pet['image'] . ' alt="Imagen" >
                    <br>
                    <button type="submit">Mas Informacion</button>
                </form>
                ');
    }

    echo '</div>';

    return $html;
}
function getPetById($id)
{

    global $miPDO;
    $sql = "SELECT *
        FROM pets  p
        WHERE p.id=:id
        ;
    ";
    $stmt = $miPDO->prepare($sql);
    $stmt->execute([':id' => $id]);
    $html = '<div class="mascotas">';
    $pet = $stmt->fetch(PDO::FETCH_ASSOC);
    echo ('<form  id="formulario" action="eliminar.php" method="post">
                    <label for="name">' . $pet['name'] . ':</label>
                    <label for="breed_id">' . $pet['breed_id'] . ':</label>
                    <label for="age">' . $pet['age'] . ':</label>
                    <label for="size">' . $pet['size'] . ':</label>
                    <label for="sex">' . $pet['sex'] . ':</label>
                    <label for="description">' . $pet['description'] . ':</label>
                    <label for="entry_date">' . $pet['entry_date'] . ':</label>
                    <br>
                   <img src=./img/' . $pet['image'] . ' alt="Imagen" width="300px">
                    <br>
                    <button type="submit">Eliminar</button>
                </form>
                ');

    echo '</div>';

    return $html;
}
