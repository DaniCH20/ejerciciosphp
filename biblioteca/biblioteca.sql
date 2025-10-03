-- Volcado de SQL de phpMyAdmin
-- versión 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2023 a las 20:02:19
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.2.0

ESTABLECER MODO SQL = "SIN VALOR AUTOMÁTICO EN CERO";
INICIAR TRANSACCIÓN;
ESTABLECER zona_horaria = "+00:00";


/*!40101 ESTABLECER @CLIENTE_DE_CONJUNTO_DE_CARACTERES_ANTIGUO=@@CLIENTE_DE_CONJUNTO_DE_CARACTERES */;
/*!40101 ESTABLECER @RESULTADOS_CONJUNTO_DE_CARACTERES_ANTIGUOS=@@RESULTADOS_CONJUNTO_DE_CARACTERES */;
/*!40101 ESTABLECER @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 ESTABLECER NOMBRES utf8mb4 */;

--
-- Base de datos: `db_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREAR TABLA `usuarios` (
  `id` int(11) NO NULO,
  `nombre_usuario` varchar(10) NOT NULL,
  `contrasena` varchar(10) NO NULO
) MOTOR=InnoDB JUEGO DE CARACTERES PREDETERMINADO=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERTAR EN `usuarios` (`id`, `nombre_usuario`, `contrasena`) VALORES
(1, 'usuario1', 'contrasena1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREAR TABLA `libros` (
  `codigo` int(11) NO NULO,
  `titulo` varchar(255) NO NULO,
  `autor` varchar(255) NO NULO,
  `disponible` tinyint(4) NO NULO
) MOTOR=InnoDB JUEGO DE CARACTERES PREDETERMINADO=utf8;

--
-- Volcado de datos para la tabla `libros`
--

INSERTAR EN `libros` (`codigo`, `titulo`, `autor`, `disponible`) VALORES
(1, 'La Guerra y la Paz', 'León Tolstoi', 1),
(2, 'Las aventuras de Huckleberry Finn', 'Mark Twain', 0),
(3, 'Hamlet', 'William Shakespeare', 1),
(4, 'En busca del tiempo perdido', 'Marcel Proust', 0),
(5, 'Don Quijote de la Mancha', 'Miguel de Cervantes', 1);

--
-- Índices para tablas volcadas
--

--
-- Índices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  AGREGAR CLAVE PRIMARIA (`id`);

--
-- Índices de la tabla `libros`
--
ALTER TABLE `libros`
  AGREGAR CLAVE PRIMARIA (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFICAR `id` int(11) NO NULO AUTO_INCREMENTO, AUTO_INCREMENTO=3;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFICAR `codigo` int(11) NO NULO AUTO_INCREMENT, AUTO_INCREMENT=6;
COMPROMETERSE;

/*!40101 ESTABLECER CONJUNTO_DE_CARACTERES_CLIENTE=@CONJUNTO_DE_CARACTERES_ANTIGUO_CLIENTE */;
/*!40101 ESTABLECER RESULTADOS DEL CONJUNTO DE CARACTERES=@RESULTADOS DEL CONJUNTO DE CARACTERES ANTIGUOS */;
/*!40101 ESTABLECER CONEXIÓN_DE_COLLATION=@CONEXIÓN_DE_COLLATION_ANTIGUA */;