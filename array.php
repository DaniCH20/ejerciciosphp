<?php
/*

| Función   | Descripción                           | Ejemplo                               |
| --------- | ------------------------------------- | ------------------------------------- |
| `array()` | Crea un array                         | `$arr = array(1, 2, 3);`              |
| `range()` | Crea un array con un rango de números | `$nums = range(1, 5); // [1,2,3,4,5]` |

| Función                     | Descripción                | Ejemplo                            |
| --------------------------- | -------------------------- | ---------------------------------- |
| `array_push($arr, $val)`    | Agrega al final            | `array_push($frutas, "Melón");`    |
| `array_pop($arr)`           | Elimina el último elemento | `array_pop($frutas);`              |
| `array_unshift($arr, $val)` | Agrega al inicio           | `array_unshift($frutas, "Fresa");` |
| `array_shift($arr)`         | Elimina el primer elemento | `array_shift($frutas);`            |

| Función                        | Descripción                 | Ejemplo                                   |
| ------------------------------ | --------------------------- | ----------------------------------------- |
| `in_array($valor, $arr)`       | ¿Existe el valor?           | `if (in_array("Banana", $frutas))`        |
| `array_key_exists($key, $arr)` | ¿Existe la clave?           | `array_key_exists("nombre", $persona)`    |
| `array_search($valor, $arr)`   | Devuelve la clave del valor | `$key = array_search("Banana", $frutas);` |

| Función        | Descripción                          | Afecta claves  |
| -------------- | ------------------------------------ | -------------- |
| `sort($arr)`   | Ordena valores ascendente            | ❌ Sí, reindexa |
| `rsort($arr)`  | Ordena descendente                   | ❌ Sí           |
| `asort($arr)`  | Ordena por valores (mantiene claves) | ✅ No           |
| `ksort($arr)`  | Ordena por claves                    | ✅ No           |
| `arsort($arr)` | Ordena por valores descendente       | ✅ No           |
| `krsort($arr)` | Ordena por claves descendente        | ✅ No           |

| Función                              | Descripción                         | Ejemplo                        |
| ------------------------------------ | ----------------------------------- | ------------------------------ |
| `array_merge($a, $b)`                | Combina dos arrays                  | `$todo = array_merge($a, $b);` |
| `array_diff($a, $b)`                 | Diferencia (qué hay en A y no en B) | `array_diff($a, $b);`          |
| `array_intersect($a, $b)`            | Elementos comunes                   | `array_intersect($a, $b);`     |
| `array_slice($arr, $start, $length)` | Extrae una parte                    | `array_slice($nums, 1, 3);`    |

| Función                                   | Descripción                        | Ejemplo                                     |
| ----------------------------------------- | ---------------------------------- | ------------------------------------------- |
| `array_map('función', $arr)`              | Aplica una función a cada elemento | `array_map('strtoupper', $nombres);`        |
| `array_filter($arr, 'función')`           | Filtra según una condición         | `array_filter($nums, fn($n) => $n > 5);`    |
| `array_reduce($arr, 'función', $inicial)` | Reduce el array a un valor         | `array_reduce($nums, fn($a,$b)=>$a+$b, 0);` |

| Función              | Descripción                  | Ejemplo                   |
| -------------------- | ---------------------------- | ------------------------- |
| `array_keys($arr)`   | Devuelve las claves          | `array_keys($persona);`   |
| `array_values($arr)` | Devuelve los valores         | `array_values($persona);` |
| `array_flip($arr)`   | Intercambia claves y valores | `array_flip($persona);`   |
| `count($arr)`        | Número de elementos          | `count($frutas);`         |

| Función              | Descripción               | Ejemplo                            |
| -------------------- | ------------------------- | ---------------------------------- |
| `shuffle($arr)`      | Mezcla aleatoriamente     | `shuffle($nums);`                  |
| `implode(',', $arr)` | Convierte en string       | `implode(", ", $frutas);`          |
| `explode(',', $str)` | Convierte string en array | `explode(", ", "uno, dos, tres");` |

*/
?>