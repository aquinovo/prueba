-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2016 a las 23:31:42
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `correoE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombres`, `apellidoP`, `apellidoM`, `correoE`) VALUES
(1, 'Rebeca Renata', 'Pérez', 'Damián', 'admin1'),
(2, 'uuuu', 'uuuu', 'yyyy', 'admin1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `correoE` varchar(50) DEFAULT NULL,
  `carrera_nombre` varchar(250) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `grupo_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombres`, `apellidoP`, `apellidoM`, `correoE`, `carrera_nombre`, `semestre`, `grupo_nombre`) VALUES
(12, 'Lizbeth Yadira', 'Colores', 'Guzmán', 'ic2013020131', 'Ingeniería en Alimentos', 1, '106-A'),
(13, 'Luis', 'Cruz', 'Martínez', 'ic2013020132', 'Ingeniería en Alimentos', 1, '106-A'),
(14, 'Frida', 'Ortíz', 'Gómez', 'ic2013020133', 'Ingeniería en Alimentos', 1, '106-A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`) VALUES
(1, 'Ingeniería en Mecánica Automotriz'),
(2, 'Ingeniería en Alimentos'),
(3, 'Ingeniería en Computación'),
(4, 'Ingeniería en Diseño'),
(5, 'Ingeniería en Electrónica'),
(6, 'Ingeniería en Mecatrónica'),
(7, 'Ingeniería Industrial'),
(8, 'Ingeniería en Física Aplicada'),
(9, 'Licenciatura en Ciencias Empresariales'),
(10, 'Licenciatura en Matemáticas Aplicadas'),
(11, 'Licenciatura en Estudios Mexicanos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `correoE` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE IF NOT EXISTS `fecha` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `Primera` date DEFAULT NULL,
  `Segunda` date DEFAULT NULL,
  `Tercera` date DEFAULT NULL,
  `gc_id` int(11) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `periodo` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `fecha`
--

INSERT INTO `fecha` (`id`, `Primera`, `Segunda`, `Tercera`, `gc_id`, `semestre`, `anio`, `periodo`) VALUES
(1, '2016-10-17', '2016-11-22', '2017-01-10', 1, 1, 2017, 'A'),
(2, '2016-10-18', '2016-11-23', '2017-01-11', 2, 1, 2017, 'A'),
(3, '2016-10-18', '2016-11-23', '2017-01-11', 3, 3, 2017, 'A'),
(4, '2016-10-19', '2016-11-24', '2017-01-12', 4, 3, 2017, 'A'),
(5, '2016-10-19', '2016-11-24', '2017-01-12', 5, 5, 2017, 'A'),
(6, '2016-10-20', '2016-11-25', '2017-01-13', 6, 7, 2017, 'A'),
(7, '2016-10-20', '2016-11-25', '2017-01-13', 7, 9, 2017, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato`
--

CREATE TABLE IF NOT EXISTS `formato` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `libro_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `periodo` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `codigo`, `carrera_id`, `semestre`, `anio`, `periodo`) VALUES
(1, '102-A', 3, 1, 2017, 'A'),
(2, '102-B', 3, 1, 2017, 'A'),
(3, '302-A', 3, 3, 2017, 'A'),
(4, '502-A', 3, 5, 2017, 'A'),
(5, '702-A', 3, 7, 2017, 'A'),
(6, '902-A', 3, 9, 2017, 'A'),
(7, '104-A', 5, 1, 2017, 'A'),
(8, '304-A', 5, 3, 2017, 'A'),
(9, '504-A', 5, 5, 2017, 'A'),
(10, '704-A', 5, 7, 2017, 'A'),
(11, '904-A', 5, 9, 2017, 'A'),
(12, '103-A', 4, 1, 2017, 'A'),
(13, '103-B', 4, 1, 2017, 'A'),
(14, '303-A', 4, 3, 2017, 'A'),
(15, '303-B', 4, 3, 2017, 'A'),
(16, '503-A', 4, 5, 2017, 'A'),
(17, '503-B', 4, 5, 2017, 'A'),
(18, '703-B', 4, 7, 2017, 'A'),
(19, '903-B', 4, 9, 2017, 'A'),
(20, '106-A', 2, 1, 2017, 'A'),
(21, '306-A', 2, 3, 2017, 'A'),
(22, '506-A', 2, 5, 2017, 'A'),
(23, '706-A', 2, 7, 2017, 'A'),
(24, '906-A', 2, 9, 2017, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_lectura`
--

CREATE TABLE IF NOT EXISTS `grupo_lectura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id1` int(11) DEFAULT NULL,
  `id2` int(11) DEFAULT NULL,
  `id3` int(11) DEFAULT NULL,
  `id4` int(11) DEFAULT NULL,
  `id5` int(11) DEFAULT NULL,
  `id6` int(11) DEFAULT NULL,
  `id7` int(11) DEFAULT NULL,
  `id8` int(11) DEFAULT NULL,
  `id9` int(11) DEFAULT NULL,
  `id10` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `grupo_lectura`
--

INSERT INTO `grupo_lectura` (`id`, `id1`, `id2`, `id3`, `id4`, `id5`, `id6`, `id7`, `id8`, `id9`, `id10`) VALUES
(1, 4, 9, 7, 6, 1, NULL, NULL, NULL, NULL, NULL),
(2, 3, 5, 10, 2, 8, NULL, NULL, NULL, NULL, NULL),
(3, 3, 4, 9, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 5, 2, 10, 7, 8, NULL, NULL, NULL, NULL, NULL),
(5, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10),
(6, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10),
(7, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lectura_usuario`
--

CREATE TABLE IF NOT EXISTS `lectura_usuario` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `alumno_id` int(11) DEFAULT NULL,
  `administrador_id` int(11) DEFAULT NULL,
  `libro_nombre` varchar(50) DEFAULT NULL,
  `resumen` text,
  `fecha` date NOT NULL,
  `lectura` varchar(50) DEFAULT NULL,
  `enviado` int(11) NOT NULL,
  `revision` text,
  `palabras` int(11) DEFAULT NULL,
  `acentos` int(11) DEFAULT NULL,
  `espacios` int(11) DEFAULT NULL,
  `frases` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `autor_nombre` varchar(250) DEFAULT NULL,
  `editorial_nombre` varchar(250) DEFAULT NULL,
  `resumen` text,
  `numeroP` int(11) DEFAULT NULL,
  `categoria` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `nombre`, `autor_nombre`, `editorial_nombre`, `resumen`, `numeroP`, `categoria`) VALUES
(1, 'Antología Poética', 'Efraín Huerta', 'Larousse', 'Este es uno de los mejores libros que habla sobre la vida en los poemas', 230, 'Poesía'),
(2, 'Cien años de soledad', 'Gabriel García Márquez', 'Larousse', 'Novela que relata el valor de la soledad', 456, 'Novela'),
(3, 'Antología Poética', 'Efraín Huerta', 'Larousse', 'Este es uno de los mejores libros que habla sobre la vida en los poemas', 230, 'Poesía'),
(4, 'Cien años de soledad', 'Gabriel García Márquez', 'Larousse', 'Novela que relata el valor de la soledad', 456, 'Novela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision_usuario`
--

CREATE TABLE IF NOT EXISTS `revision_usuario` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `alumno_id` int(20) DEFAULT NULL,
  `administrador_id` int(20) DEFAULT NULL,
  `libro_nombre` varchar(50) DEFAULT NULL,
  `resumen` text,
  `fecha` date DEFAULT NULL,
  `lectura` varchar(50) DEFAULT NULL,
  `enviado` int(11) DEFAULT NULL,
  `revision` text,
  `palabras` int(11) DEFAULT NULL,
  `acentos` int(11) DEFAULT NULL,
  `espacios` int(11) DEFAULT NULL,
  `frases` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `revision_usuario`
--

INSERT INTO `revision_usuario` (`id`, `alumno_id`, `administrador_id`, `libro_nombre`, `resumen`, `fecha`, `lectura`, `enviado`, `revision`, `palabras`, `acentos`, `espacios`, `frases`, `estado`) VALUES
(4, 11, 0, 'Antología', 'hola', '2016-10-02', 'Primera', 0, 'null', 4, 0, 0, 0, 'null'),
(5, 11, 0, 'Antología', 'me ha hecho nunca ser feliz', '2016-10-02', 'Primera', 0, 'null', 27, 0, 0, 0, 'null'),
(6, 11, 0, 'Antología Poética', 'siiii claro', '2016-10-02', 'Primera', 0, 'null', 11, 0, 0, 0, 'null'),
(7, 11, 0, 'Antología Poética', 'holaPaginator es un script de paginación desarrollado en PHP para dividir resultados de consultas extensas a una base de datos MySql, en grupos de "n" registros por página. Genera, además, una "barra de navegación" que contiene los enlaces a las diferentes páginas (<<anterior 1 2 3 4 siguiente>>).\r\n\r\nNota: Como ejemplo de paginación podemos ver la página de google, donde se dice que hay 13,235 resultados, pero aparecen divididos en varias páginas de 20 resultados cada una.\r\n\r\nLa característica principal de este script es su fácil utilización, ya que la forma de paginar es muy conocida y utilizada. Por ello, no es necesario entenderlo ni editarlo, sino simplemente incluirlo después de definir al menos una variable. No obstante, todas las líneas están comentadas debidamente, para que sea sencillo seguir la secuencia y saber qué hace el script en cada línea. Y lo mejor de todo es que está completamente en español.\r\n\r\nUtilización del script\r\n\r\nLa utilización es extremadamente sencilla. Debemos Conectar con la Base de datos, definir una sentencia sql válida para MySql y almacenarla en la variable $_pagi_sql. Esta sentencia SQL no debe contener la cláusula "LIMIT", pues será agregada automáticamente por el script.\r\n\r\nLa definición de esta variable es obligatoria. Se pueden crear otras variables para personalizar el sistema de paginación en detalles como el número de resultados por página o el número de enlaces a otras páginas de resultados que aparecerán.\r\n\r\nLuego, se incluye el script de paginación, y se generan otras variables que podemos utilizar para hacer la página de resultados. $_pagi_result es el id de resultado de la consulta, que podemos utilizar con alguna función tipo mysql_fetch_array(). $_pagi_navegación contiene la barra de navegación \r\nwqtesdgdfffffffffffffffffffff', '2016-10-02', 'Primera', 0, 'null', 1792, 0, 0, 0, 'null'),
(8, 12, 0, 'Antología Poética', 'Paginator es un script de paginación desarrollado en PHP para dividir resultados de consultas extensas a una base de datos MySql, en grupos de "n" registros por página. Genera, además, una "barra de navegación" que contiene los enlaces a las diferentes páginas (<<anterior 1 2 3 4 siguiente>>).\r\n\r\nNota: Como ejemplo de paginación podemos ver la página de google, donde se dice que hay 13,235 resultados, pero aparecen divididos en varias páginas de 20 resultados cada una.\r\n\r\nLa característica principal de este script es su fácil utilización, ya que la forma de paginar es muy conocida y utilizada. Por ello, no es necesario entenderlo ni editarlo, sino simplemente incluirlo después de definir al menos una variable. No obstante, todas las líneas están comentadas debidamente, para que sea sencillo seguir la secuencia y saber qué hace el script en cada línea. Y lo mejor de todo es que está completamente en español.\r\n\r\nUtilización del script\r\n\r\nLa utilización es extremadamente sencilla. Debemos Conectar con la Base de datos, definir una sentencia sql válida para MySql y almacenarla en la variable $_pagi_sql. Esta sentencia SQL no debe contener la cláusula "LIMIT", pues será agregada automáticamente por el script.\r\n\r\nLa definición de esta variable es obligatoria. Se pueden crear otras variables para personalizar el sistema de paginación en detalles como el número de resultados por página o el número de enlaces a otras páginas de resultados que aparecerán.\r\n\r\nLuego, se incluye el script de paginación, y se generan otras variables que podemos utilizar para hacer la página de resultados. $_pagi_result es el id de resultado de la consulta, que podemos utilizar con alguna función tipo mysql_fetch_array(). $_pagi_navegación contiene la barra de navegación ', '2016-10-02', 'Primera', 0, 'null', 1758, 0, 0, 0, 'null'),
(9, 14, NULL, 'Antología', 'Hola mundo cruel :P', '2016-10-18', 'Primera', NULL, NULL, 678, NULL, NULL, NULL, NULL),
(10, 13, NULL, 'Mundo', 'OOHHHHHHH', '2016-10-13', 'Primera', NULL, NULL, 546, NULL, NULL, NULL, NULL),
(11, 12, 0, 'Antología Poética', 'SELECT Primera,Segunda,Tercera FROM lectura_usuari\r\n Como podemos ver, no hay mayor trabajo adicional, respecto al que se realizaría en un código sin paginar. Cabe aclarar que el nombre de las variables que utiliza el script (internas y externas) empiezan todas por el prefijo $_pagi_ para evitar conflictos por coincidencias con los nombres de otras variables que se estén utilizando.\r\n\r\nNota: El autor de este proyecto dejó de mantener la página de inicio, donde ofrecía una descripción más detallada del script, así como la descarga. Nosotros teníamos una copia del código PHP, que la hemos recuperado para aquellos interesados en implementar la paginación de resultados. El script ya tiene años, pero nosotros seguimos utilizándolo en alguna de las secciones de DesarrolloWeb.com sin problemas.\r\n\r\nInsistimos en que el script no es nuestro, sino de su autor, Jorge Pinedo Rosas. No hemos pedido permiso para ofrecerlo para descarga, pero esperamos que Jorge no le importe que lo pongamos a disposición de las personas por este canal. Puedes encontrar toda la información sobre la autoría, así como algunas notas para su implementación como comentario en el propio código PHP del script.\r\n\r\nPara descargar el script de manera gratuita: http://www.desarrolloweb.com/articulos/ejemplos/paginator.inc.php.zip\r\n\r\nNota: Si quieres aprender a paginar resultados por tu cuenta, en DesarrolloWeb.com hemos publicado un artículo interesante que te puede v', '2016-10-03', 'Primera', 0, 'null', 1440, 0, 0, 0, 'null'),
(12, 12, 0, 'Antología Poética', 'ttttt Los hermanos Pinzón, Martín Alonso, Vicente Yáñez y Francisco Martín, marinos españoles, eran los tres miembros de la familia Pinzón, naturales de Palos de la Frontera (Huelva), de finales del siglo XV y comienzos del XVI, que participaron activamente en el primer viaje de Cristóbal Colón, que tuvo como resultado el descubrimiento de América, y en otros viajes de descubrimiento y exploración.\r\n\r\nFueron marinos de destacado prestigio en la comarca costera de Huelva, y gracias a sus diferentes viajes comerciales y de cabotaje adquirieron fama y una situación holgada, que les permitió gozar de respeto y reconocimiento entre sus coetáneos. La estratégica posición que ofrecía el histórico puerto de Palos, desde donde salían expediciones tanto a las costas africanas como a la guerra contra Portugal, permitió que fuera el lugar desde donde partieran la mayoría de sus armadas, organizadas, en muchas ocasiones, por esta familia.\r\n\r\nMartín Alonso y Vicente Yáñez, capitanes de las carabelas La Pinta y La Niña, respectivamente, son los hermanos más conocidos, pero hay un tercero, menos popular, que iba a bordo de La Pinta como maestre: Francisco Martín. Martín Alonso fue el hombre gracias al cual se consiguió que la marinería de la zona del Tinto-Odiel se animara a participar en la empresa colombina. Asimismo apoyó económicamente el proyecto aportando dinero de su hacienda personal. Francisco, el maestre de La Pinta, parece que, además de en el primero, participó también en el tercero y cuarto de los viajes colombinos, pero, por ser su nombre muy común, sus datos biográficos se confunden con otros homónimos de su época. Por último, Vicente Yáñez, el menor de los tres hermanos, además de participar en el primer viaje de Colón, una vez finalizado el monopolio colombino, realizó otros viajes de descubrimiento por su cuenta, entre los que cabe destacar el descubrimiento del Brasil.', '2016-10-03', 'Primera', 0, 'null', 1900, 0, 0, 0, 'null');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
