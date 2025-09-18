<!-- Repetiremos el ejercicio1 pero esta vez la
  insertaremos dentro de una funcion para 
  poder observar el funcionamiento de global y
   static . Como habreis observado la nomenclatura
    de la funcion es -->
    <?php
    echo 'Mi primer ejercicio con variables';
    echo '<br>';
    $z= 1;
    ejercicio();
    function ejercicio(){
        global $z; 
        static $x= 2.1;
        $sum= $z + $x;
        printf("la suma de x + y es ");
        printf((int)$sum);
        echo '<br>';
        print("  la suma de x + y es ");
        printf($sum);
    }

    ?>
